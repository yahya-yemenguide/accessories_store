/* Dar Al-Kurdi | Why choose — gentle gold spotlight + mouse-only 3D tilt */
(() => {
  'use strict';
  function init(){
    const section = document.getElementById('darWhyChoose');
    if (!section || section.dataset.dwInit === '1') return;
    section.dataset.dwInit = '1';
    const cards = Array.from(section.querySelectorAll('.dar-why__card'));
    if(!cards.length) return;
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    const fine = window.matchMedia('(hover:hover) and (pointer:fine)');
    let visible = false, active = 0, timer = null, hovering = false;
    function choose(n){ active = n % cards.length; cards.forEach((card,i)=>card.classList.toggle('is-lit',i===active)); }
    function stop(){ if(timer !== null){clearInterval(timer);timer=null;} }
    function update(){
      stop();
      if(document.hidden || !visible || reduced.matches || hovering){cards.forEach(c=>c.classList.remove('is-lit'));return;}
      choose(active);
      timer=setInterval(()=>choose(active+1),4300);
    }
    cards.forEach((card,i)=>{
      card.addEventListener('pointerenter',e=>{if(e.pointerType==='mouse'){hovering=true;stop();choose(i);}});
      card.addEventListener('pointerleave',()=>{hovering=false;card.style.removeProperty('--dw-rx');card.style.removeProperty('--dw-ry');update();});
      card.addEventListener('pointermove',e=>{
        if(!fine.matches || reduced.matches || e.pointerType!=='mouse')return;
        const box=card.getBoundingClientRect();
        const x=(e.clientX-box.left)/box.width-.5, y=(e.clientY-box.top)/box.height-.5;
        card.style.setProperty('--dw-rx',`${(-y*4).toFixed(2)}deg`);
        card.style.setProperty('--dw-ry',`${(x*5).toFixed(2)}deg`);
      },{passive:true});
    });
    document.addEventListener('visibilitychange',update);
    reduced.addEventListener?.('change',update);
    if('IntersectionObserver' in window){
      const observer=new IntersectionObserver(entries=>{visible=entries.some(e=>e.isIntersecting);update();},{threshold:.12});
      observer.observe(section);
    }else{visible=true;update();}
  }
  if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init,{once:true});
  else init();
})();
