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
  let motionFrame = 0, motionProgress = 0;
  const motionPanel = shell.querySelector('#dkMotionPanel');
  const surface = motionPanel.querySelector('.dk-motion-surface');
  const frameSvg = motionPanel.querySelector('.dk-motion-frame');
  const edgePaths = [...frameSvg.querySelectorAll('path[class^="dk-motion-edge-"]')];
  const jewelA = frameSvg.querySelector('.dk-motion-jewel-a');
  const jewelB = frameSvg.querySelector('.dk-motion-jewel-b');
  const mobile = matchMedia('(max-width:760px)');
  const duration = 1800;
  const clamp = x => Math.max(0,Math.min(1,x));
  const ease = x => (1-Math.cos(Math.PI*x))/2;
  // The outline and the gold stroke share exactly the same Bézier path.
  function paintMotion(p) {
    motionProgress = p;
    const isMobile = mobile.matches;
    const fraction = isMobile ? .32 : .5;
    // Same continuous oversized sweep as the original reference: expand,
    // cover the full card, swap the form, then uncover the opposite side.
    const travel = 4 - 2 * fraction;
    const start = Math.max(0, fraction - 3 + travel * p);
    const end = Math.min(1, fraction + travel * p);
    const size = end - start;
    shell.style.setProperty('--dk-travel',p.toFixed(6));
    shell.style.setProperty('--dk-start',`${start*100}%`);
    shell.style.setProperty('--dk-size',`${size*100}%`);
    // Keep the entire greeting and artwork attached to the center of the curtain.
    // Change the greeting only while the curtain fully covers the form.
    const a = 1-clamp((p-.43)/.07), b = clamp((p-.50)/.07);
    shell.style.setProperty('--dk-login-alpha',a.toFixed(4));
    shell.style.setProperty('--dk-register-alpha',b.toFixed(4));
    const w=motionPanel.clientWidth, h=motionPanel.clientHeight;
    if(!w||!h)return;
    const m=5, r=Math.min(17,w/10,h/10), W=w-m, H=h-m;
    const f=n=>Number(n.toFixed(2));
    const pt=(x,y)=>`${f(x)} ${f(y)}`;
    let d, ax,ay,bx,by;
    if(mobile.matches){
      const depth=Math.min(53,h*.23), top=depth*clamp(start/(1-fraction)), bottom=depth*clamp((1-end)/(1-fraction));
      const t=m+top, bot=H-bottom;
      d=`M ${pt(m+r,t)} Q ${pt(w*.24,t-top*.44)} ${pt(w*.39,t-top*.44)} Q ${pt(w*.46,t-top*.44)} ${pt(w*.5,m)} Q ${pt(w*.54,t-top*.44)} ${pt(w*.61,t-top*.44)} Q ${pt(w*.76,t-top*.44)} ${pt(W-r,t)} Q ${pt(W,t)} ${pt(W,t+r)} L ${pt(W,bot-r)} Q ${pt(W,bot)} ${pt(W-r,bot)} Q ${pt(w*.76,bot+bottom*.44)} ${pt(w*.61,bot+bottom*.44)} Q ${pt(w*.54,bot+bottom*.44)} ${pt(w*.5,H)} Q ${pt(w*.46,bot+bottom*.44)} ${pt(w*.39,bot+bottom*.44)} Q ${pt(w*.24,bot+bottom*.44)} ${pt(m+r,bot)} Q ${pt(m,bot)} ${pt(m,bot-r)} L ${pt(m,t+r)} Q ${pt(m,t)} ${pt(m+r,t)} Z`;
      ax=w/2;ay=H-3;bx=w/2;by=m+3;
    }else{
      // Restore the previous rounded desktop edge, with no pointed side or jewel.
      const l=m, q=W, t=m, bot=H;
      const radius=Math.min(100,w*.23,h*.20);
      const left=r+(radius-r)*clamp(start/(1-fraction));
      const right=r+(radius-r)*clamp((1-end)/(1-fraction));
      d=`M ${pt(l+left,t)} L ${pt(q-right,t)} Q ${pt(q,t)} ${pt(q,t+right)} L ${pt(q,bot-right)} Q ${pt(q,bot)} ${pt(q-right,bot)} L ${pt(l+left,bot)} Q ${pt(l,bot)} ${pt(l,bot-left)} L ${pt(l,t+left)} Q ${pt(l,t)} ${pt(l+left,t)} Z`;
      ax=W-3;ay=h/2;bx=m+3;by=h/2;
    }
    surface.style.clipPath=`path('${d}')`;
    frameSvg.setAttribute('viewBox',`0 0 ${w} ${h}`);
    edgePaths.forEach(path=>path.setAttribute('d',d));
    jewelA.setAttribute('transform',`translate(${ax} ${ay})`);jewelA.style.opacity=isMobile?clamp((1-end)/(1-fraction)).toFixed(3):0;
    jewelB.setAttribute('transform',`translate(${bx} ${by})`);jewelB.style.opacity=isMobile?clamp(start/(1-fraction)).toFixed(3):0;
  }
  const redraw=()=>paintMotion(motionProgress);
  window.addEventListener('resize',redraw,{passive:true});
  if(typeof ResizeObserver!=='undefined')new ResizeObserver(()=>{if(!switching)redraw();}).observe(shell);
  function animateMotion(target,reveal,finish){
    cancelAnimationFrame(motionFrame);
    const from=motionProgress, start=performance.now();let swapped=false;
    function tick(now){
      const t=clamp((now-start)/duration), p=from+(target-from)*ease(t);
      paintMotion(p);
      if(!swapped&&t>=.5){swapped=true;reveal();}
      if(t<1)motionFrame=requestAnimationFrame(tick);
      else{paintMotion(target);if(!swapped)reveal();finish();}
    }
    motionFrame=requestAnimationFrame(tick);
  }
  let swapTimer = 0;
  function show(name, focus = true) {
    const next = views.find(v => v.dataset.view === name);
    if (!next || switching) return;
    const register = ['register','verify'].includes(name);
    const targetSide = register ? 'register' : 'login';
    const moved = shell.classList.contains('active') !== register;
    clearTimeout(timer); clearTimeout(focusTimer); clearTimeout(swapTimer);
    current = name;
    const previous = document.activeElement;
    if (previous && shell.contains(previous)) previous.blur();
    const reveal = () => {
      next.closest('.dk-auth-content').appendChild(status);
      views.forEach(v => { v.hidden = v !== next; v.classList.remove('is-entering'); });
      sides.forEach(s => s.classList.toggle('is-covered',s.dataset.side !== targetSide));
      requestAnimationFrame(() => next.classList.add('is-entering'));
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
      animateMotion(register?1:0,()=>{shell.classList.toggle('active',register);reveal();},finish);
    } else {
      shell.classList.toggle('active',register); paintMotion(register?1:0); reveal(); finish();
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
