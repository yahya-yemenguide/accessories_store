/* Dar Al-Kurdi | Diamond scroll V7. Fixes thumb bounds and bottom disappearing. */
(() => {
  'use strict';

  const mq = window.matchMedia('(min-width: 768px) and (hover: hover) and (pointer: fine)');
  if (!document.body || !window.requestAnimationFrame || !mq.matches) return;

  const doc = document.documentElement;
  /* Remove an earlier rail if scripts were included twice. */
  document.querySelectorAll('.dak-rail').forEach(el => el.remove());

  const rail = document.createElement('div');
  rail.className = 'dak-rail';
  rail.setAttribute('aria-label','مسطرة التمرير الملكية');
  rail.innerHTML = `
    <div class="dak-rail__bed" aria-hidden="true"></div>
    <div class="dak-rail__progress" aria-hidden="true"></div>
    <span class="dak-rail__top" aria-hidden="true">✦</span>
    <span class="dak-rail__bottom" aria-hidden="true">✧</span>
    <div class="dak-rail__thumb" role="scrollbar" tabindex="0" aria-label="تمرير الصفحة"
      aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
      <span class="dak-rail__gem" aria-hidden="true">
        <svg viewBox="0 0 32 36" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="dakGemV6" x1="0" y1="0" x2="1" y2="1">
              <stop stop-color="#fffdf4"/><stop offset=".45" stop-color="#f3d0a2"/>
              <stop offset=".7" stop-color="#fffefa"/><stop offset="1" stop-color="#b67936"/>
            </linearGradient>
          </defs>
          <path d="M16 2 L29 17 L16 34 L3 17 Z" fill="#815019" stroke="#fff4cc" stroke-width="1.5"/>
          <path d="M16 5 L26 17 L16 30 L6 17 Z" fill="url(#dakGemV6)"/>
          <path d="M16 5 V30 M6 17 H26 M16 5 L6 17 L16 30 L26 17 Z"
            fill="none" stroke="#ffffffb8" stroke-width="1"/>
          <circle cx="16" cy="17" r="3" fill="#fffefa"/>
          <path class="dak-spark" d="M23 3 V11 M19 7 H27"
            stroke="#fff7dc" stroke-width="1.7" stroke-linecap="round"/>
        </svg>
      </span>
    </div>`;
  document.body.appendChild(rail);

  const thumb = rail.querySelector('.dak-rail__thumb');
  let raf = 0, dragging = false, thumbOffset = 0, maxScroll = 0, movable = 0;
  const pad = 11;
  const clamp = (v, lo, hi) => Math.max(lo, Math.min(hi, v));
  const pageY = () => window.scrollY || doc.scrollTop || 0;

  function setTop(){
    // Anchor the rail to the golden BOTTOM edge of the complete sticky header.
    // Never overlap the brand, search bar, or desktop navigation.
    const header = document.getElementById('frontStickyShell');
    const boundary = header && header.getBoundingClientRect();
    const fallback = document.querySelector('.front-sticky-shell');
    const fallbackBoundary = fallback && fallback.getBoundingClientRect();
    const bottom = boundary ? boundary.bottom : (fallbackBoundary ? fallbackBoundary.bottom : 285);
    const top = clamp(Math.round(bottom), 0, Math.max(0,window.innerHeight-180));
    rail.style.setProperty('--dak-rail-top', top + 'px');
  }
  function sync(){
    raf = 0;
    setTop();
    const docHeight = Math.max(doc.scrollHeight, document.body.scrollHeight);
    maxScroll = Math.max(0, docHeight - window.innerHeight);
    const height = rail.clientHeight;
    const track = Math.max(0,height - 2 * pad);
    // Always fit thumb inside the actual fixed rail.
    const length = clamp(Math.round(track * window.innerHeight / Math.max(docHeight,1)),
                         74, Math.min(144, track));
    const safeLength = clamp(length, 0, track);
    thumb.style.height = safeLength + 'px';
    movable = Math.max(0, track - safeLength);
    const ratio = maxScroll ? clamp(pageY() / maxScroll, 0, 1) : 0;
    const y = pad + ratio * movable;
    thumb.style.transform = `translate3d(0,${Math.round(y)}px,0)`;
    rail.style.setProperty('--dak-progress', Math.round(ratio * (height - 2*pad)) + 'px');
    thumb.setAttribute('aria-valuenow', String(Math.round(ratio*100)));
    thumb.setAttribute('aria-valuetext', Math.round(ratio*100)+'٪ من الصفحة');
    const show = maxScroll > 50 && height > 160 && mq.matches;
    rail.dataset.active = String(show);
    doc.classList.toggle('dak-rail-ready', show);
  }
  function schedule(){ if(!raf) raf = requestAnimationFrame(sync); }

  function dragTo(clientY){
    const bounds = rail.getBoundingClientRect();
    const nextY = clamp(clientY - bounds.top - thumbOffset - pad,0,movable);
    const p = movable ? nextY / movable : 0;
    window.scrollTo({top:p*maxScroll,behavior:'instant'});
    schedule();
  }
  thumb.addEventListener('pointerdown', e => {
    if(e.button !== 0) return;
    e.preventDefault();
    dragging = true;
    rail.classList.add('is-dragging');
    thumbOffset = e.clientY - thumb.getBoundingClientRect().top;
    thumb.setPointerCapture(e.pointerId);
  });
  thumb.addEventListener('pointermove',e => {if(dragging) dragTo(e.clientY);});
  function end(e){
    dragging=false;
    rail.classList.remove('is-dragging');
    try {if(e && thumb.hasPointerCapture(e.pointerId)) thumb.releasePointerCapture(e.pointerId);}
    catch (_) {}
  }
  thumb.addEventListener('pointerup',end);
  thumb.addEventListener('pointercancel',end);
  window.addEventListener('blur',()=>end());

  rail.addEventListener('pointerdown',e => {
    if(e.target.closest('.dak-rail__thumb')) return;
    thumbOffset = thumb.offsetHeight / 2;
    dragTo(e.clientY);
  });
  thumb.addEventListener('keydown',e => {
    const k=e.key,s=window.innerHeight*.16;
    let next=null;
    if(k==='ArrowDown')next=pageY()+s;
    if(k==='ArrowUp')next=pageY()-s;
    if(k==='PageDown')next=pageY()+window.innerHeight*.85;
    if(k==='PageUp')next=pageY()-window.innerHeight*.85;
    if(k==='Home')next=0;
    if(k==='End')next=maxScroll;
    if(next!==null){
      e.preventDefault();
      window.scrollTo({top:clamp(next,0,maxScroll),behavior:'smooth'});
    }
  });
  window.addEventListener('scroll',schedule,{passive:true});
  window.addEventListener('resize',schedule,{passive:true});
  if(mq.addEventListener) mq.addEventListener('change',schedule);
  if('ResizeObserver' in window){
    const ro = new ResizeObserver(schedule);
    ro.observe(document.body);
  }
  window.addEventListener('load',schedule);
  sync();
})();
