/* Dar Al-Kurdi | Silk Boutique V6: smooth four-offer carousel + subtle 3D motion */
document.addEventListener('DOMContentLoaded', () => {
  'use strict';
  const section = document.getElementById('akOffers');
  const viewport = document.getElementById('silkOffersViewport');
  const meter = document.getElementById('silkOffersMeter');
  if (!section || !viewport || !meter || meter.dataset.ready === '1') return;
  meter.dataset.ready = '1';

  const cards = Array.from(viewport.querySelectorAll('.silk-offers__card'));
  if (!cards.length) return;
  const fill = meter.querySelector('.silk-offers__meter-fill');
  const gem = meter.querySelector('.silk-offers__meter-gem');
  const dots = Array.from(section.querySelectorAll('.silk-offers__dots i'));
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  const finePointer = window.matchMedia('(hover:hover) and (pointer:fine)');
  const clamp = (n, lo, hi) => Math.max(lo, Math.min(hi, n));
  const max = () => Math.max(0, viewport.scrollWidth - viewport.clientWidth);
  const mode = (() => {
    const el = document.createElement('div');
    el.style.cssText = 'width:4px;height:1px;direction:rtl;overflow:scroll;position:absolute;left:-9999px;';
    const child = document.createElement('div'); child.style.cssText = 'width:8px;height:1px;';
    el.appendChild(child); document.body.appendChild(el);
    const initial = el.scrollLeft; el.scrollLeft = 1;
    const rising = el.scrollLeft === 1; el.remove();
    return rising ? 'asc' : (initial > 0 ? 'desc' : 'negative');
  })();
  const progress = () => {
    const m = max(); if (m <= 0) return 0;
    const x = viewport.scrollLeft;
    return clamp(mode === 'negative' ? -x/m : mode === 'desc' ? (m-x)/m : x/m, 0, 1);
  };
  const pos = p => {
    const x = clamp(p,0,1)*max();
    return mode === 'negative' ? -x : mode === 'desc' ? max()-x : x;
  };

  let frame = 0, snapTimer = 0, draggingMeter = false, pointerDrag = false;
  let startX = 0, startScroll = 0, moved = false, blockClick = false;
  const indexAtStart = () => {
    const edge = viewport.getBoundingClientRect().right;
    let index = 0, best = Infinity;
    cards.forEach((card,i) => {
      const d = Math.abs(card.getBoundingClientRect().right-edge);
      if(d < best) {index=i;best=d;}
    });
    return index;
  };
  function paint() {
    frame=0;
    const p=progress();
    if(fill) fill.style.width=(p*100)+'%';
    if(gem) gem.style.right=(p*100)+'%';
    meter.setAttribute('aria-valuenow',String(Math.round(p*100)));
    const active=indexAtStart();
    cards.forEach((c,i)=>c.classList.toggle('silk-is-spotlight',i===active));
    dots.forEach((dot,i)=>dot.classList.toggle('is-active',i===active));
  }
  const update = () => {if(!frame) frame=requestAnimationFrame(paint);};
  const goToIndex = (index, smooth=true) => {
    const i=clamp(index,0,cards.length-1);
    const vp=viewport.getBoundingClientRect();
    const c=cards[i].getBoundingClientRect();
    // RTL-independent offset: the selected card's RIGHT edge aligns with viewport RIGHT.
    const displacement=c.right-vp.right;
    if (Math.abs(displacement) < 1.5) return;
    const raw=viewport.scrollLeft+displacement;
    viewport.scrollTo({left:raw,behavior:(smooth&&!reduced.matches)?'smooth':'instant'});
    update();
  };
  const snapToClosest = () => {
    if(draggingMeter || pointerDrag) return;
    goToIndex(indexAtStart(),true);
  };
  viewport.addEventListener('scroll', () => {
    update();
    clearTimeout(snapTimer);
    if(!pointerDrag && !draggingMeter) snapTimer=setTimeout(snapToClosest,165);
  }, {passive:true});
  window.addEventListener('resize',update,{passive:true});

  // Meter: live tracking on drag, elegant smooth travel on click, plus keyboard access.
  function meterProgress(e) {
    const b=meter.getBoundingClientRect();
    return b.width ? clamp((b.right-e.clientX)/b.width,0,1) : 0;
  }
  meter.addEventListener('pointerdown',e=>{
    if(e.pointerType==='mouse' && e.button!==0)return;
    draggingMeter=true;meter.classList.add('is-moving');
    meter.setPointerCapture(e.pointerId);
    viewport.scrollTo({left:pos(meterProgress(e)),behavior:'instant'});
    e.preventDefault();update();
  });
  meter.addEventListener('pointermove',e=>{
    if(!draggingMeter)return;
    viewport.scrollTo({left:pos(meterProgress(e)),behavior:'instant'});update();
  });
  function stopMeter() {
    if(!draggingMeter)return;
    draggingMeter=false;meter.classList.remove('is-moving');
    setTimeout(snapToClosest,20);
  }
  ['pointerup','pointercancel','lostpointercapture'].forEach(t=>meter.addEventListener(t,stopMeter));
  meter.addEventListener('keydown',e=>{
    const idx=indexAtStart();let target=null;
    if(e.key==='ArrowLeft')target=idx+1;
    else if(e.key==='ArrowRight')target=idx-1;
    else if(e.key==='Home')target=0;
    else if(e.key==='End')target=cards.length-1;
    if(target!==null){e.preventDefault();goToIndex(target,true);}
  });

  // Mouse drag works on desktop cards; native inertial touch remains untouched.
  viewport.addEventListener('pointerdown',e=>{
    if(e.pointerType!=='mouse'||e.button!==0||e.target.closest('button,a'))return;
    pointerDrag=true;moved=false;startX=e.clientX;startScroll=viewport.scrollLeft;
    viewport.classList.add('silk-is-dragging');
  });
  window.addEventListener('pointermove',e=>{
    if(!pointerDrag)return;
    const dx=e.clientX-startX;
    if(Math.abs(dx)>5)moved=true;
    viewport.scrollLeft=startScroll-dx;update();
  },{passive:true});
  function finishDrag(){
    if(!pointerDrag)return;
    pointerDrag=false;viewport.classList.remove('silk-is-dragging');
    if(moved){blockClick=true;setTimeout(()=>blockClick=false,100);}
    setTimeout(snapToClosest,30);
  }
  window.addEventListener('pointerup',finishDrag);
  window.addEventListener('pointercancel',finishDrag);
  viewport.addEventListener('click',e=>{if(blockClick){e.preventDefault();e.stopPropagation();}},true);

  // Tiny pointer-following tilt, only while a desktop pointer is over a card.
  cards.forEach(card=>{
    if(!finePointer.matches || reduced.matches)return;
    let tiltFrame=0;
    card.addEventListener('pointermove',e=>{
      const b=card.getBoundingClientRect();
      const x=clamp((e.clientX-b.left)/b.width,0,1);
      const y=clamp((e.clientY-b.top)/b.height,0,1);
      if(tiltFrame)cancelAnimationFrame(tiltFrame);
      tiltFrame=requestAnimationFrame(()=>{
        tiltFrame=0;
        card.style.setProperty('--silk-rx',((.5-y)*4).toFixed(2)+'deg');
        card.style.setProperty('--silk-ry',((x-.5)*-5).toFixed(2)+'deg');
        card.style.setProperty('--silk-light-x',Math.round(x*100)+'%');
        card.style.setProperty('--silk-light-y',Math.round(y*100)+'%');
      });
    },{passive:true});
    card.addEventListener('pointerleave',()=>{
      if(tiltFrame)cancelAnimationFrame(tiltFrame);tiltFrame=0;
      card.style.setProperty('--silk-rx','0deg');
      card.style.setProperty('--silk-ry','0deg');
    });
  });
  // Real buttons for an accessible details dialog, with existing sample prices.
  const dialog=section.querySelector('#silkOffersDialog');
  section.querySelectorAll('[data-silk-detail]').forEach(button=>{
    button.addEventListener('click',()=>{
      if(!dialog)return;
      const title=dialog.querySelector('#silkOffersDialogTitle');
      const desc=dialog.querySelector('#silkOffersDialogDescription');
      if(title)title.textContent=button.dataset.name||'';
      if(desc)desc.textContent='خصم '+(button.dataset.off||'')+'٪ — السعر المعروض '+(button.dataset.price||'')+' ر.ي';
      if(typeof dialog.showModal==='function')dialog.showModal();
    });
  });
  update();
});
