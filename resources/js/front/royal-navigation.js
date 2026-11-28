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
  const categories = document.querySelectorAll('#luxuryCategories .category-card');
  const categoryIds=['dkCategoryPlated','dkCategorySilver','dkCategoryWatches','dkCategoryZircon','dkCategoryRings'];
  categories.forEach((card,index)=>{if(categoryIds[index] && !card.id)card.id=categoryIds[index];});
  const homeLinks = [...document.querySelectorAll('a[href*="#"]')].filter(a=>{
    try{const url=new URL(a.href,location.href);return url.origin===location.origin && url.hash.length>1 && url.pathname.replace(/\/+$/,'')===location.pathname.replace(/\/+$/,'');}catch{return false;}
  });
  homeLinks.forEach(link=>link.addEventListener('click',event=>{
    if(event.ctrlKey || event.metaKey || event.shiftKey || event.altKey || event.button>0)return;
    let id;try{id=decodeURIComponent(new URL(link.href,location.href).hash.slice(1));}catch{return;}
    const dest=document.getElementById(id);
    if(!dest)return;
    event.preventDefault();
    if(history.pushState)history.pushState(null,'','#'+encodeURIComponent(id));
    const sticky=document.getElementById('frontStickyShell');
    const offset=(sticky?.getBoundingClientRect().height||0)+12;
    const target=window.scrollY+dest.getBoundingClientRect().top-offset;
    window.scrollTo({top:Math.max(0,target),behavior:matchMedia('(prefers-reduced-motion:reduce)').matches?'auto':'smooth'});
  }));
  function visitHash(){
    let id;try{id=decodeURIComponent(location.hash.slice(1));}catch{return;}if(!id)return;
    const dest=document.getElementById(id);if(!dest)return;
    const offset=(document.getElementById('frontStickyShell')?.getBoundingClientRect().height||0)+12;
    window.scrollTo({top:Math.max(0,window.scrollY+dest.getBoundingClientRect().top-offset),behavior:'auto'});
  }
  if(location.hash)window.setTimeout(visitHash,100);
  window.addEventListener('popstate',visitHash);
  let toastTimer;
  document.querySelectorAll('[data-pending-feature]').forEach(link=>link.addEventListener('click', event=>{
    event.preventDefault();const name=link.dataset.pendingFeature;
    document.querySelector('.dk-nav-toast')?.remove();
    const notice=document.createElement('div');notice.className='dk-nav-toast';notice.setAttribute('role','status');
    notice.textContent='صفحة «'+name+'» ستكون متاحة قريبًا';document.body.appendChild(notice);
    clearTimeout(toastTimer);toastTimer=setTimeout(()=>notice.remove(),2800);
  }));
});

document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('siteHeader');
    const sidebar = document.getElementById('mobileSidebar');
    const categoryIds = ['luxuryCategories','dkCategoryPlated','dkCategorySilver','dkCategoryWatches','dkCategoryZircon','dkCategoryRings'];
    const desktop = [...header.querySelectorAll('.desktop-nav-link')];
    const mobile = [...(sidebar?.querySelectorAll('.sidebar-link') || [])];
    const sublinks = [...header.querySelectorAll('.dk-nav-dropdown__panel a'), ...(sidebar?.querySelectorAll('.dk-sidebar-subnav') || [])];
    function readHash(value) { try { return decodeURIComponent(value.replace(/^#/,'')); } catch { return ''; } }
    function linkId(link) {
        if (link.dataset.navSection === 'account') return 'account';
        if (link.matches('.dk-nav-dropdown__trigger,.dk-sidebar-categories__toggle')) return 'luxuryCategories';
        return readHash(new URL(link.href,location.href).hash) || 'home';
    }
    function select(id) {
        const group = categoryIds.includes(id) ? 'luxuryCategories' : id || 'home';
        [...desktop,...mobile].forEach(link => {
            const active = linkId(link) === group;
            link.classList.toggle('active',active);
            if (active) link.setAttribute('aria-current',group === 'home' ? 'page' : 'location');
            else link.removeAttribute('aria-current');
        });
        sublinks.forEach(link => {
            if (linkId(link) === id) link.setAttribute('aria-current','location');
            else link.removeAttribute('aria-current');
        });
    }
    function sync(){ select(readHash(location.hash) || 'home'); }
    [...desktop,...mobile,...sublinks].forEach(link => link.addEventListener('click',event => {
        if(event.ctrlKey || event.metaKey || event.shiftKey || event.altKey || event.button > 0) return;
        if (link.matches('.dk-nav-dropdown__trigger,.dk-sidebar-categories__toggle')) return;
        select(linkId(link));
    }));
    document.addEventListener('click', event => {
        const anchor = event.target.closest?.('a[href]');
        if (!anchor || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey || event.button > 0) return;
        const url = new URL(anchor.href, location.href);
        if (url.origin === location.origin && url.pathname.replace(/\/+$/, '') === location.pathname.replace(/\/+$/, '') && url.hash.length > 1 && document.getElementById(readHash(url.hash))) select(readHash(url.hash));
    });
    window.addEventListener('hashchange',sync);
    window.addEventListener('popstate',sync);
    window.addEventListener('pageshow',sync);
    sync();
});
