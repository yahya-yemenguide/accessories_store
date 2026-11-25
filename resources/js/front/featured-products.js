document.addEventListener('DOMContentLoaded', () => {
  const section = document.getElementById('featuredProducts');
  const viewport = document.getElementById('dkProductsViewport');
  const ruler = document.getElementById('dkProductsRuler');
  if (!section || !viewport || !ruler || ruler.dataset.dkInit === '1') return;
  ruler.dataset.dkInit = '1';
  const cards = [...viewport.querySelectorAll('.dk-product')];
  const line = ruler.querySelector('.dk-products__ruler-line');
  const fill = ruler.querySelector('.dk-products__ruler-fill');
  const thumb = ruler.querySelector('.dk-products__ruler-thumb');
  if (!line || !fill || !thumb) return;
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)');
  const maxScroll = () => Math.max(0, viewport.scrollWidth - viewport.clientWidth);
  let raf = 0;

  // Browsers differ in RTL scrollLeft conventions: normalize without jumping the track.
  const rtlMode = (() => {
    const test = document.createElement('div');
    test.style.cssText = 'width:4px;height:1px;overflow:scroll;direction:rtl;position:absolute;left:-9999px;';
    const child = document.createElement('div'); child.style.width='8px'; child.style.height='1px';
    test.appendChild(child); document.body.appendChild(test);
    const initial = test.scrollLeft; test.scrollLeft = 1;
    const positive = test.scrollLeft === 1; test.remove();
    return positive ? 'positive-ascending' : (initial > 0 ? 'positive-descending' : 'negative');
  })();
  function progress() {
    const m = maxScroll(); if (!m) return 0;
    const left = viewport.scrollLeft;
    if (rtlMode === 'negative') return Math.max(0,Math.min(1,-left/m));
    if (rtlMode === 'positive-descending') return Math.max(0,Math.min(1,(m-left)/m));
    return Math.max(0,Math.min(1,left/m));
  }
  function positionFor(p) {
    const val = Math.max(0,Math.min(1,p))*maxScroll();
    if (rtlMode==='negative') return -val;
    if (rtlMode==='positive-descending') return maxScroll()-val;
    return val;
  }
  function paint() {
    raf=0; const p=progress();
    fill.style.width=(p*100)+'%'; thumb.style.right=(p*100)+'%';
    ruler.setAttribute('aria-valuenow',String(Math.round(p*100)));
    ruler.setAttribute('aria-valuetext',`${Math.round(p*100)} بالمئة`);
    if (!finePointer.matches && cards.length) {
      const cx=viewport.getBoundingClientRect().left+viewport.clientWidth/2;
      let closest=null,dist=Infinity;
      cards.forEach(card=>{ const r=card.getBoundingClientRect();const d=Math.abs(r.left+r.width/2-cx);if(d<dist){dist=d;closest=card;} });
      cards.forEach(card=>card.classList.toggle('dk-product--spotlight',card===closest));
    }
  }
  function update(){if(!raf)raf=requestAnimationFrame(paint);}
  viewport.addEventListener('scroll',update,{passive:true});window.addEventListener('resize',update,{passive:true});update();

  let rulerDragging=false;
  function rulerMove(e){
    const b=line.getBoundingClientRect();if(!b.width)return;
    const p=Math.max(0,Math.min(1,(b.right-e.clientX)/b.width));
    viewport.scrollLeft=positionFor(p);update();
  }
  ruler.addEventListener('pointerdown',e=>{
    if(e.pointerType==='mouse'&&e.button!==0)return;
    rulerDragging=true;ruler.classList.add('dk-ruler-active');
    viewport.classList.add('dk-is-dragging');ruler.setPointerCapture(e.pointerId);rulerMove(e);e.preventDefault();
  });
  ruler.addEventListener('pointermove',e=>{if(rulerDragging)rulerMove(e);});
  function endRuler(){rulerDragging=false;ruler.classList.remove('dk-ruler-active');viewport.classList.remove('dk-is-dragging');}
  ruler.addEventListener('pointerup',endRuler);ruler.addEventListener('pointercancel',endRuler);ruler.addEventListener('lostpointercapture',endRuler);
  ruler.addEventListener('keydown',e=>{
    let p=progress();
    if(e.key==='ArrowLeft')p+=.12;
    else if(e.key==='ArrowRight')p-=.12;
    else if(e.key==='Home')p=0;
    else if(e.key==='End')p=1;
    else return;
    e.preventDefault();viewport.scrollTo({left:positionFor(p),behavior:reduced.matches?'instant':'smooth'});
  });

  // Mouse-drag from the product image or card background. Leave buttons clickable.
  let dragging=false, moved=false,startX=0,startLeft=0,lastX=0,lastT=0,velocity=0;
  viewport.addEventListener('pointerdown',e=>{
    if(e.pointerType!=='mouse'||e.button!==0||e.target.closest('button,a'))return;
    dragging=true;moved=false;startX=e.clientX;startLeft=viewport.scrollLeft;
    lastX=e.clientX;lastT=performance.now();velocity=0;
    viewport.classList.add('dk-is-dragging');viewport.setPointerCapture(e.pointerId);
  });
  viewport.addEventListener('pointermove',e=>{
    if(!dragging)return;
    const delta=e.clientX-startX;
    if(Math.abs(delta)>4)moved=true;
    viewport.scrollLeft=startLeft-delta;
    const now=performance.now(),dt=now-lastT;
    if(dt>0)velocity=Math.max(-2,Math.min(2,(e.clientX-lastX)/dt));
    lastT=now;lastX=e.clientX;update();
  });
  function endDrag(){
    if(!dragging)return;dragging=false;viewport.classList.remove('dk-is-dragging');
    if(moved&&!reduced.matches){viewport.scrollTo({left:Math.max(-maxScroll(),Math.min(maxScroll(),viewport.scrollLeft-velocity*100)),behavior:'smooth'});}
  }
  viewport.addEventListener('pointerup',endDrag);viewport.addEventListener('pointercancel',endDrag);viewport.addEventListener('lostpointercapture',endDrag);

  // Gentle 3D tilt, only on devices with a mouse. No tilt on touch screens.
  cards.forEach((card,i)=>{
    card.style.setProperty('--dk-order',Math.min(i,6));
    if(!finePointer.matches||reduced.matches)return;
    let tiltRaf=0,pointerX=.5,pointerY=.5;
    card.addEventListener('pointermove',e=>{
      const b=card.getBoundingClientRect();pointerX=Math.max(0,Math.min(1,(e.clientX-b.left)/b.width));pointerY=Math.max(0,Math.min(1,(e.clientY-b.top)/b.height));
      if(!tiltRaf)tiltRaf=requestAnimationFrame(()=>{
        tiltRaf=0;card.style.setProperty('--dk-tilt-x',((.5-pointerY)*4).toFixed(2)+'deg');
        card.style.setProperty('--dk-tilt-y',((pointerX-.5)*-5).toFixed(2)+'deg');
        card.style.setProperty('--dk-mx',(pointerX*100).toFixed(1)+'%');
        card.style.setProperty('--dk-my',(pointerY*100).toFixed(1)+'%');
      });
    },{passive:true});
    card.addEventListener('pointerleave',()=>{if(tiltRaf)cancelAnimationFrame(tiltRaf);tiltRaf=0;card.style.setProperty('--dk-tilt-x','0deg');card.style.setProperty('--dk-tilt-y','0deg');});
  });
  // Reveal only when section enters the viewport. Nothing hidden before JS loads.
  if(!reduced.matches && 'IntersectionObserver' in window){
    const obs=new IntersectionObserver(entries=>{if(entries.some(e=>e.isIntersecting)){section.classList.add('dk-was-revealed');obs.disconnect();setTimeout(()=>section.classList.remove('dk-was-revealed'),1400);}}, {threshold:.12});
    obs.observe(section);
  }

// V4: visible, ongoing luxury light. No reliance on mouse hover or a one-time reveal.
// Desktop: spotlight visits products in sequence. Mobile: the centred card is highlighted
// by the existing scroll listener, so the showcase never moves cards without consent.
let v4Current = -1;
let v4Timer = null;
let v4Visible = false;
let v4Hover = false;
const v4MotionAllowed = () => !reduced.matches && !document.hidden && v4Visible;
function v4ClearTimer(){ if (v4Timer !== null){ window.clearInterval(v4Timer); v4Timer=null; } }
function v4Spot(index){
  if (!cards.length || !finePointer.matches) return;
  v4Current = (index + cards.length) % cards.length;
  cards.forEach((card,i)=>card.classList.toggle('dk-product--spotlight',i===v4Current));
}
function v4State(){
  const playing=v4MotionAllowed();
  section.classList.toggle('dk-v4-active',playing);
  v4ClearTimer();
  if (!playing) return;
  if (finePointer.matches) {
    if (!v4Hover) {
      if(v4Current<0) v4Spot(0);
      v4Timer=window.setInterval(()=>v4Spot(v4Current+1),3200);
    }
  } else { update(); }
}
cards.forEach(card=>{
  card.addEventListener('pointerenter',e=>{
    if(e.pointerType==='mouse'){v4Hover=true;v4ClearTimer();cards.forEach(c=>c.classList.toggle('dk-product--spotlight',c===card));}
  });
  card.addEventListener('pointerleave',e=>{
    if(e.pointerType==='mouse'){v4Hover=false;v4State();}
  });
});
document.addEventListener('visibilitychange',v4State);
reduced.addEventListener?.('change',v4State);
finePointer.addEventListener?.('change',v4State);
if('IntersectionObserver' in window){
  const v4Observer=new IntersectionObserver(entries=>{v4Visible=entries.some(e=>e.isIntersecting);v4State();},{threshold:0.1});
  v4Observer.observe(section);
} else {v4Visible=true;v4State();}

  // Demo interactions preserved from V2, not linked to the database yet.
  viewport.querySelectorAll('.dk-product__heart').forEach(button=>button.addEventListener('click',()=>{
    const active=button.getAttribute('aria-pressed')==='true';
    button.setAttribute('aria-pressed',String(!active));
    const icon=button.querySelector('i');if(icon)icon.className=active?'bi bi-heart':'bi bi-heart-fill';
  }));
  viewport.querySelectorAll('.dk-product__cart').forEach(button=>button.addEventListener('click',()=>{
    if(button.animate&&!reduced.matches)button.animate([{transform:'scale(1)'},{transform:'scale(.87)'},{transform:'scale(1)'}],{duration:320});
    button.title='السلة ستعمل بعد ربط المنتجات بقاعدة البيانات';
  }));
});
