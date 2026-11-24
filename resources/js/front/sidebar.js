// Independent, keyboard-accessible navigation drawer.
document.addEventListener('DOMContentLoaded', () => {
  const root = document.getElementById('mobileSidebar');
  const openButton = document.getElementById('menuToggleBtn');
  const closeButton = document.getElementById('sidebarCloseBtn');
  const backdrop = document.getElementById('sidebarBackdrop');
  const panel = root?.querySelector('.sidebar-panel');
  if (!root || !openButton || !panel) return;
  let previousFocus = null;
  function open() {
    previousFocus = document.activeElement;
    root.removeAttribute('inert');
    root.classList.add('is-open');
    root.setAttribute('aria-hidden','false');
    openButton.setAttribute('aria-expanded','true');
    document.body.classList.add('front-sidebar-open');
    closeButton?.focus();
  }
  function close() {
    root.classList.remove('is-open');
    root.setAttribute('aria-hidden','true');
    root.setAttribute('inert','');
    openButton.setAttribute('aria-expanded','false');
    document.body.classList.remove('front-sidebar-open');
    if (previousFocus && typeof previousFocus.focus === 'function') previousFocus.focus();
  }
  openButton.addEventListener('click', open);
  closeButton?.addEventListener('click', close);
  backdrop?.addEventListener('click', close);
  root.querySelectorAll('.sidebar-link').forEach(a => a.addEventListener('click', close));
  document.addEventListener('keydown', event => {
    if (!root.classList.contains('is-open')) return;
    if (event.key === 'Escape') { event.preventDefault(); close(); return; }
    if (event.key === 'Tab') {
      const focusable = [...panel.querySelectorAll('button:not([disabled]),a[href],input:not([disabled])')];
      if (!focusable.length) return;
      const first=focusable[0], last=focusable[focusable.length-1];
      if(event.shiftKey && document.activeElement===first){event.preventDefault();last.focus();}
      else if(!event.shiftKey && document.activeElement===last){event.preventDefault();first.focus();}
    }
  });
});
