document.addEventListener('DOMContentLoaded', () => {
  const root = document.getElementById('mobileSidebar');
  const toggle = document.getElementById('menuToggleBtn');
  const closeBtn = document.getElementById('sidebarCloseBtn');
  const backdrop = document.getElementById('sidebarBackdrop');
  const panel = root?.querySelector('.sidebar-panel');
  if (!root || !toggle || !panel) return;
  let previouslyFocused = null;
  function close() {
    root.classList.remove('is-open');
    root.setAttribute('aria-hidden','true');
    root.setAttribute('inert','');
    toggle.setAttribute('aria-expanded','false');
    document.body.classList.remove('front-sidebar-open');
    if (previouslyFocused?.focus) previouslyFocused.focus();
  }
  function open() {
    previouslyFocused = document.activeElement;
    root.removeAttribute('inert');
    root.setAttribute('aria-hidden','false');
    root.classList.add('is-open');
    toggle.setAttribute('aria-expanded','true');
    document.body.classList.add('front-sidebar-open');
    closeBtn?.focus();
  }
  toggle.addEventListener('click', () => root.classList.contains('is-open') ? close() : open());
  closeBtn?.addEventListener('click', close);
  backdrop?.addEventListener('click', close);
  root.querySelectorAll('.sidebar-link').forEach(link => link.addEventListener('click', close));
  document.addEventListener('keydown', (event) => {
    if (!root.classList.contains('is-open')) return;
    if (event.key === 'Escape') {event.preventDefault();close();return;}
    if (event.key !== 'Tab') return;
    const focusable = [...panel.querySelectorAll('button:not([disabled]),a[href]')];
    if (!focusable.length) return;
    const first=focusable[0],last=focusable[focusable.length-1];
    if(event.shiftKey && document.activeElement===first){event.preventDefault();last.focus();}
    if(!event.shiftKey && document.activeElement===last){event.preventDefault();first.focus();}
  });
  window.matchMedia('(min-width: 1100px)').addEventListener?.('change', e => { if(e.matches && root.classList.contains('is-open')) close(); });
});
