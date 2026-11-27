/* Dar Al-Kurdi mobile drawer. Desktop navigation and the existing royal-navigation.js are untouched. */
document.addEventListener('DOMContentLoaded', () => {
  const root = document.getElementById('mobileSidebar');
  const toggle = document.getElementById('menuToggleBtn');
  const closeButton = document.getElementById('sidebarCloseBtn');
  const backdrop = document.getElementById('sidebarBackdrop');
  const panel = root?.querySelector('.sidebar-panel');
  if (!root || !toggle || !panel) return;
  let previousFocus = null;
  const isOpen = () => root.classList.contains('is-open');
  function close() {
    if (!isOpen()) return;
    root.classList.remove('is-open');
    root.setAttribute('aria-hidden', 'true');
    root.setAttribute('inert', '');
    toggle.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('front-sidebar-open');
    if (previousFocus?.isConnected) previousFocus.focus();
  }
  function open() {
    if (isOpen()) return;
    previousFocus = document.activeElement;
    root.removeAttribute('inert');
    root.setAttribute('aria-hidden', 'false');
    root.classList.add('is-open');
    toggle.setAttribute('aria-expanded', 'true');
    document.body.classList.add('front-sidebar-open');
    closeButton?.focus();
  }
  toggle.addEventListener('click', () => isOpen() ? close() : open());
  closeButton?.addEventListener('click', close);
  backdrop?.addEventListener('click', close);
  // The categories button must stay open; actual navigation links close the drawer.
  root.querySelectorAll('.sidebar-link[href], .dk-sidebar-subnav[href]').forEach(a => {
    a.addEventListener('click', close);
  });
  document.addEventListener('keydown', event => {
    if (!isOpen()) return;
    if (event.key === 'Escape') {event.preventDefault();close();return;}
    if (event.key !== 'Tab') return;
    const focusable = [...panel.querySelectorAll('button:not([disabled]),a[href]')].filter(el => !el.closest('[hidden]'));
    if (!focusable.length) return;
    if (event.shiftKey && document.activeElement === focusable[0]) {event.preventDefault();focusable.at(-1).focus();}
    else if (!event.shiftKey && document.activeElement === focusable.at(-1)) {event.preventDefault();focusable[0].focus();}
  });
  window.matchMedia('(min-width: 1100px)').addEventListener?.('change', e => { if (e.matches) close(); });
});
