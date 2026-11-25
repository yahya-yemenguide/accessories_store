/* Dar Al-Kurdi | independent best sellers gallery; no global scroll overrides */
document.addEventListener('DOMContentLoaded', () => {
  const section = document.getElementById('akBestSellers');
  if (!section || section.dataset.akReady) return;
  section.dataset.akReady = '1';
  const viewport = document.getElementById('akBestViewport');
  const meter = document.getElementById('akBestMeter');
  const fill = meter?.querySelector('.ak-best__meter-fill');
  const jewel = meter?.querySelector('.ak-best__meter-jewel');
  const count = document.getElementById('akBestCount');
  const cards = Array.from(viewport?.querySelectorAll('.ak-best__card') || []);
  if (!viewport || !meter || !fill || !jewel || !cards.length) return;
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)');
  const max = () => Math.max(0, viewport.scrollWidth - viewport.clientWidth);
  // RTL: normalize scrollLeft across Chrome, Firefox and legacy WebKit.
  const mode = (() => {
    const outer = document.createElement('div');
    outer.style.cssText = 'position:absolute;left:-9999px;top:0;width:4px;height:1px;overflow:scroll;direction:rtl';
    const inner = document.createElement('div');
    inner.style.cssText = 'width:8px;height:1px';
    outer.appendChild(inner); document.body.appendChild(outer);
    const initial = outer.scrollLeft; outer.scrollLeft = 1;
    const positive = outer.scrollLeft === 1; outer.remove();
    return positive ? 'ascending' : initial > 0 ? 'descending' : 'negative';
  })();
  const clamp = n => Math.max(0,Math.min(1,n));
  const progress = () => !max() ? 0 : clamp(mode === 'negative' ? -viewport.scrollLeft / max() : mode === 'descending' ? (max()-viewport.scrollLeft)/max() : viewport.scrollLeft/max());
  const position = p => mode === 'negative' ? -p*max() : mode === 'descending' ? max()*(1-p) : p*max();
  let raf = 0, timer = null, visible = false, hovering = false, dragging = false;
  let current = 0;
  function paint() {
    raf=0;
    const p = progress();
    fill.style.width = (100*p)+'%';
    jewel.style.right = (100*p)+'%';
    meter.setAttribute('aria-valuenow',String(Math.round(100*p)));
    const cr=viewport.getBoundingClientRect();
    let closest=0,dist=Infinity;
    cards.forEach((card,i)=>{
      const r=card.getBoundingClientRect();
      const d=Math.abs((r.left+r.right)/2-(cr.left+cr.right)/2);
      if(d<dist){dist=d;closest=i;}
    });
    count.innerHTML = `<b>${String(closest+1).padStart(2,'0')}</b> / ${String(cards.length).padStart(2,'0')}`;
  }
  function schedule(){if(!raf)raf=requestAnimationFrame(paint);}
  viewport.addEventListener('scroll',schedule,{passive:true});
  window.addEventListener('resize',schedule,{passive:true});
  function seek(x){
    const r=meter.querySelector('.ak-best__meter-rail').getBoundingClientRect();
    const p=clamp((r.right-x)/Math.max(1,r.width));
    viewport.scrollLeft=position(p);schedule();
  }
  meter.addEventListener('pointerdown',e=>{
    if(e.pointerType==='mouse'&&e.button!==0)return;
    dragging=true;meter.setPointerCapture(e.pointerId);seek(e.clientX);e.preventDefault();
  });
  meter.addEventListener('pointermove',e=>{if(dragging)seek(e.clientX);});
  ['pointerup','pointercancel','lostpointercapture'].forEach(k=>meter.addEventListener(k,()=>{dragging=false;}));
  meter.addEventListener('keydown',e=>{
    let p=progress();
    if(e.key==='ArrowLeft')p+=.12;
    else if(e.key==='ArrowRight')p-=.12;
    else if(e.key==='Home')p=0;
    else if(e.key==='End')p=1;
    else return;
    e.preventDefault();viewport.scrollTo({left:position(clamp(p)),behavior:reduce.matches?'instant':'smooth'});
  });
  // Pointer drag only on card backgrounds, never on an actual link or button.
  let down=false, startX=0, startLeft=0;
  viewport.addEventListener('pointerdown',e=>{
    if(e.pointerType!=='mouse'||e.button!==0||e.target.closest('button,a'))return;
    down=true;startX=e.clientX;startLeft=viewport.scrollLeft;
    viewport.classList.add('is-dragging');viewport.setPointerCapture(e.pointerId);
  });
  viewport.addEventListener('pointermove',e=>{if(down){viewport.scrollLeft=startLeft-(e.clientX-startX);schedule();}});
  ['pointerup','pointercancel','lostpointercapture'].forEach(k=>viewport.addEventListener(k,()=>{down=false;viewport.classList.remove('is-dragging');}));
  // One crown glows at a time; no automatic movement of the customer's carousel.
  function crown(){cards.forEach((c,i)=>c.classList.toggle('is-crowned',i===current));}
  function stop(){if(timer){clearInterval(timer);timer=null;}}
  function updateTimer(){
    stop();
    if(reduce.matches||document.hidden||!visible||hovering)return;
    timer=setInterval(()=>{current=(current+1)%Math.min(cards.length,3);crown();},4200);
  }
  cards.forEach((c,i)=>{
    c.addEventListener('pointerenter',e=>{if(e.pointerType!=='mouse')return;hovering=true;stop();cards.forEach((v,j)=>v.classList.toggle('is-crowned',j===i));});
    c.addEventListener('pointerleave',e=>{if(e.pointerType!=='mouse')return;hovering=false;crown();updateTimer();});
  });
  if('IntersectionObserver' in window){
    new IntersectionObserver(es=>{visible=es.some(e=>e.isIntersecting);updateTimer();},{threshold:.1}).observe(section);
  }else{visible=true;updateTimer();}
  document.addEventListener('visibilitychange',updateTimer);
  reduce.addEventListener?.('change',updateTimer);
  crown();paint();
});
