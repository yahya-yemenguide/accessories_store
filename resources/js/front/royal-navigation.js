/* Dar Al-Kurdi: actionable home anchors, accessible category menus; not fake pages. */
document.addEventListener('DOMContentLoaded', () => {
  const root = document.getElementById('dkDesktopCategories');
  const trigger = root?.querySelector('.dk-nav-dropdown__trigger');
  const closeDropdown = () => {root?.classList.remove('is-open');trigger?.setAttribute('aria-expanded','false');};
  trigger?.addEventListener('click', () => {
    const open = !root.classList.contains('is-open');
    root.classList.toggle('is-open',open);
    trigger.setAttribute('aria-expanded',String(open));
  });
  document.addEventListener('pointerdown', event => {if(root && !root.contains(event.target)) closeDropdown();});
  document.addEventListener('keydown', event => {if(event.key==='Escape'){closeDropdown();if(document.activeElement && root?.contains(document.activeElement))trigger?.focus();}});
  root?.querySelectorAll('a').forEach(a=>a.addEventListener('click',closeDropdown));

  const mobileCategories = document.getElementById('dkSidebarCategories');
  const mobileToggle = mobileCategories?.querySelector('.dk-sidebar-categories__toggle');
  const mobileList = document.getElementById('dkSidebarCategoryMenu');
  mobileToggle?.addEventListener('click', () => {
    const isOpen = mobileToggle.getAttribute('aria-expanded') === 'true';
    mobileToggle.setAttribute('aria-expanded',String(!isOpen));
    if(mobileList) mobileList.hidden=isOpen;
  });
  // Category cards are existing sections on the homepage, not yet independent pages.
  const categories = document.querySelectorAll('#luxuryCategories .category-card');
  const categoryIds=['dkCategoryPlated','dkCategorySilver','dkCategoryWatches','dkCategoryZircon','dkCategoryRings'];
  categories.forEach((card,index)=>{if(categoryIds[index] && !card.id)card.id=categoryIds[index];});

  // Header sticks on scroll; keep headings comfortably below it.
  const homeLinks = [...document.querySelectorAll('a[href*="#"]')].filter(a=>{
    try{const url=new URL(a.href,location.href);return url.hash.length>1 && url.pathname.replace(/\/+$/,'')===location.pathname.replace(/\/+$/,'');}catch{return false;}
  });
  homeLinks.forEach(link=>link.addEventListener('click',event=>{
    let id;try{id=decodeURIComponent(new URL(link.href,location.href).hash.slice(1));}catch{return;}
    const dest=document.getElementById(id);
    if(!dest)return;
    event.preventDefault();
    // Let the existing sidebar click handler close the drawer first.
    if(history.pushState)history.pushState(null,'','#'+encodeURIComponent(id));
    const sticky=document.getElementById('frontStickyShell');
    const offset=(sticky?.getBoundingClientRect().height||0)+12;
    const target=window.scrollY+dest.getBoundingClientRect().top-offset;
    window.scrollTo({top:Math.max(0,target),behavior:matchMedia('(prefers-reduced-motion:reduce)').matches?'auto':'smooth'});
  }));
  // Support direct visits and browser back/forward to a section.
  function visitHash(){
    const id=decodeURIComponent(location.hash.slice(1));if(!id)return;
    const dest=document.getElementById(id);if(!dest)return;
    const offset=(document.getElementById('frontStickyShell')?.getBoundingClientRect().height||0)+12;
    window.scrollTo({top:Math.max(0,window.scrollY+dest.getBoundingClientRect().top-offset),behavior:'auto'});
  }
  if(location.hash)window.setTimeout(visitHash,100);
  window.addEventListener('popstate',visitHash);

  // Planned routes are explicitly indicated rather than deceptively navigating to '#'.
  let toastTimer;
  document.querySelectorAll('[data-pending-feature]').forEach(link=>link.addEventListener('click', event=>{
    event.preventDefault();const name=link.dataset.pendingFeature;
    document.querySelector('.dk-nav-toast')?.remove();
    const notice=document.createElement('div');notice.className='dk-nav-toast';notice.setAttribute('role','status');
    notice.textContent='صفحة «'+name+'» ستكون متاحة قريبًا';document.body.appendChild(notice);
    clearTimeout(toastTimer);toastTimer=setTimeout(()=>notice.remove(),2800);
  }));
});
