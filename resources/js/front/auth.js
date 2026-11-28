/* Visual prototype only. No credentials are submitted, stored or sent. */
document.addEventListener('DOMContentLoaded', () => {
  'use strict';
  const shell = document.getElementById('dkAuth');
  if (!shell) return;
  const status = document.getElementById('dkAuthStatus');
  const views = [...shell.querySelectorAll('[data-view]')];
  const sides = [...shell.querySelectorAll('[data-side]')];
  const panels = [...shell.querySelectorAll('[data-panel]')];
  const reduced = matchMedia('(prefers-reduced-motion: reduce)');
  const baseStatus = ''; 
  let current = 'login', switching = false, timer = 0, focusTimer = 0;
  const timers = new Map();
  const announce = text => { status.textContent = text; status.hidden = !text; };
  const setInteractive = (el, yes) => { el.inert = !yes; el.setAttribute('aria-hidden', String(!yes)); };
  // One class drives the native CSS animation; no layout reads or redraw loop.
  function show(name, focus = true) {
    const next = views.find(v => v.dataset.view === name);
    if (!next || switching) return;
    const register = ['register','verify'].includes(name);
    const targetSide = register ? 'register' : 'login';
    const moved = shell.classList.contains('active') !== register;
    clearTimeout(timer); clearTimeout(focusTimer);
    current = name;
    const previous = document.activeElement;
    if (previous && shell.contains(previous)) previous.blur();
    const reveal = () => {
      next.closest('.dk-auth-content').appendChild(status);
      views.forEach(v => { v.hidden = v !== next; v.classList.remove('is-entering'); });
      sides.forEach(s => s.classList.toggle('is-covered',s.dataset.side !== targetSide));
    };
    const finish = () => {
      switching = false; shell.classList.remove('is-switching');
      sides.forEach(s => setInteractive(s,s.dataset.side===targetSide));
      panels.forEach(p => setInteractive(p,p.dataset.panel===targetSide));
      if (focus) { const h=next.querySelector('h1'); if(h){h.tabIndex=-1;h.focus({preventScroll:true});} }
    };
    if (moved && !reduced.matches) {
      switching = true; shell.classList.add('is-switching');
      sides.forEach(s => setInteractive(s,false)); panels.forEach(p => setInteractive(p,false));
      shell.classList.toggle('active',register);
      // Swap hidden forms while the oversized curtain covers both halves.
      timer = setTimeout(reveal, 900);
      focusTimer = setTimeout(finish, 1800);
    } else {
      shell.classList.toggle('active',register); reveal(); finish();
    }
    announce(baseStatus);
  }
  shell.querySelectorAll('[data-go]').forEach(b => b.addEventListener('click',()=>show(b.dataset.go)));
  shell.querySelectorAll('[data-google]').forEach(b=>b.addEventListener('click',()=>announce('زر Google للمعاينة فقط؛ سيتم ربطه بخدمة Google في مرحلة البرمجة.')));
  shell.querySelectorAll('[data-password]').forEach(b=>b.addEventListener('click',()=>{const input=b.parentElement.querySelector('input');const visible=input.type==='password';input.type=visible?'text':'password';b.setAttribute('aria-label',visible?'إخفاء كلمة المرور':'إظهار كلمة المرور');b.querySelector('i').className=visible?'bi bi-eye-slash':'bi bi-eye';}));
  shell.querySelectorAll('[data-strength]').forEach(input=>input.addEventListener('input',()=>{const value=input.value;const score=value.length?Number(value.length>=8)+Number(value.length>=12)+Number(/[0-9]/.test(value))+Number(/[^\p{L}\p{N}\s]/u.test(value)):0;const bar=input.closest('form').querySelector('.dk-strength');bar.querySelector('i').style.width=(value.length?Math.max(12,score*25):0)+'%';bar.querySelector('i').style.background=score>=3?'#57844c':score>=2?'#c78c38':'#b64d37';bar.querySelector('small').textContent=!value?'قوة كلمة المرور':score>=3?'قوية':score>=2?'متوسطة':'ضعيفة';}));
  function resetOtp(form){form.querySelectorAll('.dk-otp input').forEach(i=>i.value='');form.querySelector('.dk-otp-error').hidden=true;}
  function countdown(button){clearInterval(timers.get(button));let remaining=30;button.disabled=true;button.textContent='إعادة الإرسال بعد '+remaining+' ثانية';timers.set(button,setInterval(()=>{remaining--;button.textContent=remaining?'إعادة الإرسال بعد '+remaining+' ثانية':'إعادة إرسال الرمز (تجريبي)';if(!remaining){clearInterval(timers.get(button));timers.delete(button);button.disabled=false;}},1000));}
  function startOtp(kind){const form=shell.querySelector('[data-demo-form="'+kind+'-otp"]');resetOtp(form);show(kind==='register'?'verify':'reset-verify');countdown(form.querySelector('[data-resend]'));}
  shell.querySelectorAll('.dk-otp').forEach(group=>{const inputs=[...group.querySelectorAll('input')];inputs.forEach((input,i)=>{input.addEventListener('input',()=>{input.value=input.value.replace(/[^0-9]/g,'').slice(0,1);group.parentElement.querySelector('.dk-otp-error').hidden=true;if(input.value&&i<5)inputs[i+1].focus();});input.addEventListener('keydown',e=>{if(e.key==='Backspace'&&!input.value&&i>0)inputs[i-1].focus();});input.addEventListener('paste',e=>{e.preventDefault();const value=(e.clipboardData.getData('text')||'').replace(/\D/g,'').slice(0,6);[...value].forEach((v,j)=>inputs[j].value=v);inputs[Math.min(value.length,5)].focus();});});});
  shell.querySelectorAll('[data-resend]').forEach(button=>button.addEventListener('click',()=>{resetOtp(button.closest('form'));countdown(button);announce('معاينة إعادة الإرسال فقط؛ استخدمي الرمز التجريبي 123456.');}));
  shell.querySelectorAll('[data-demo-form]').forEach(form=>form.addEventListener('submit',e=>{e.preventDefault();if(switching)return;switch(form.dataset.demoForm){case 'login':announce('نجحت معاينة النموذج؛ لم يتم تسجيل دخول حقيقي.');break;case 'register':startOtp('register');break;case 'forgot':startOtp('reset');break;case 'register-otp':case 'reset-otp':{const code=[...form.querySelectorAll('.dk-otp input')].map(i=>i.value).join('');if(code!=='123456'){form.querySelector('.dk-otp-error').hidden=false;return;}if(form.dataset.demoForm==='register-otp'){show('success');document.getElementById('dkSuccessText').textContent='اكتملت معاينة التحقق؛ لم يتم إنشاء حساب حقيقي.';}else show('reset');break;}case 'reset':show('success');document.getElementById('dkSuccessText').textContent='اكتملت معاينة تغيير كلمة المرور؛ لم يتم تعديل أي حساب.';break;}}));
  let frame=0; shell.addEventListener('pointermove',e=>{if(reduced.matches||frame)return;const x=e.clientX,y=e.clientY;frame=requestAnimationFrame(()=>{const r=shell.getBoundingClientRect();shell.style.setProperty('--px',`${(x-r.left)/r.width*100}%`);shell.style.setProperty('--py',`${(y-r.top)/r.height*100}%`);frame=0;});},{passive:true});
  shell.addEventListener('pointerleave',()=>{shell.style.setProperty('--px','50%');shell.style.setProperty('--py','40%');});
  show('login',false);
});
