(()=>{'use strict';
const root=document.getElementById('darReviews');if(!root||root.dataset.royalReady)return;root.dataset.royalReady='yes';
const cards=[...root.querySelectorAll('[data-dkr-card]')],dots=root.querySelector('[data-dkr-dots]');let active=0;
function paint(){cards.forEach((card,i)=>{const diff=(i-active+cards.length)%cards.length;card.dataset.dkrPosition=diff===0?'center':diff===1?'left':diff===cards.length-1?'right':'hidden';card.setAttribute('aria-hidden',diff!==0?'true':'false');});[...dots.children].forEach((dot,i)=>dot.setAttribute('aria-current',String(i===active)))}
cards.forEach((_,i)=>{const b=document.createElement('button');b.type='button';b.className='dk-review__dot';b.setAttribute('aria-label',`عرض الرأي ${i+1}`);b.addEventListener('click',()=>{active=i;paint()});dots.append(b)});
root.querySelector('[data-dkr-prev]').addEventListener('click',()=>{active=(active-1+cards.length)%cards.length;paint()});root.querySelector('[data-dkr-next]').addEventListener('click',()=>{active=(active+1)%cards.length;paint()});
const allButton=root.querySelector('[data-dkr-all]');if(allButton)allButton.addEventListener('click',()=>{active=(active+1)%cards.length;paint();root.querySelector('[data-dkr-stage]').scrollIntoView({behavior:'smooth',block:'center'});});
const stage=root.querySelector('[data-dkr-stage]');let startX=null;stage.addEventListener('touchstart',e=>{startX=e.changedTouches[0]?.clientX??null},{passive:true});stage.addEventListener('touchend',e=>{if(startX===null)return;const distance=(e.changedTouches[0]?.clientX??startX)-startX;startX=null;if(Math.abs(distance)>45){active=(active+(distance>0?1:-1)+cards.length)%cards.length;paint()}},{passive:true});paint();
// Portal out of clipped/isolated section: fixes horizontally cut-off modal in previous version.
const modal=root.querySelector('[data-dkr-modal]');document.body.appendChild(modal);const dialog=modal.querySelector('.dk-review__dialog');let returnFocus=null,oldOverflow='';
const open=()=>{returnFocus=document.activeElement;oldOverflow=document.body.style.overflow;modal.hidden=false;document.body.style.overflow='hidden';dialog.focus()};const close=()=>{modal.hidden=true;document.body.style.overflow=oldOverflow;returnFocus?.focus?.()};root.querySelectorAll('[data-dkr-open]').forEach(b=>b.addEventListener('click',open));modal.querySelectorAll('[data-dkr-close]').forEach(el=>el.addEventListener('click',close));modal.addEventListener('keydown',e=>{if(e.key==='Escape'){e.preventDefault();close()}if(e.key==='Tab'){const focusable=[...dialog.querySelectorAll('button,input,textarea')].filter(el=>!el.disabled);if(!focusable.length)return;const first=focusable[0],last=focusable[focusable.length-1];if(e.shiftKey&&document.activeElement===first){e.preventDefault();last.focus()}else if(!e.shiftKey&&document.activeElement===last){e.preventDefault();first.focus()}}});
const rating=modal.querySelector('[data-dkr-rating]');function updateRating(){let checked=Number(rating.querySelector('input:checked')?.value||0);rating.querySelectorAll('label').forEach(label=>label.classList.toggle('is-lit',Number(label.querySelector('input').value)<=checked))}rating.addEventListener('change',updateRating);updateRating();modal.querySelector('[data-dkr-form]').addEventListener('submit',e=>{
  e.preventDefault();
  const message=modal.querySelector('#dkReviewContent').value.trim();
  if(!message){modal.querySelector('[data-dkr-feedback]').textContent='اكتبي رأيك أول، وبعدها بنعرض لك المعاينة.';return}
  const score=Number(rating.querySelector('input:checked')?.value||5);
  const preview=cards[0];
  preview.querySelector('.dk-review__card-top strong').textContent='معاينة رأيك';
  preview.querySelector('.dk-review__buyer').textContent='معاينة محلية · غير منشور';
  preview.querySelector('.dk-review__avatar').textContent='✎';
  preview.querySelector('.dk-review__stars').textContent='★'.repeat(score)+'☆'.repeat(5-score);
  preview.querySelector('.dk-review__stars').setAttribute('aria-label',`تقييم تجريبي: ${score} من 5`);
  preview.querySelector('.dk-review__copy').textContent=message;
  active=0;paint();close();
  root.querySelector('[data-dkr-stage]').scrollIntoView({behavior:'smooth',block:'center'});
});
})();
