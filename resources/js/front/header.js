document.addEventListener('DOMContentLoaded', () => {
  const shell = document.getElementById('frontStickyShell');
  let waiting = false;
  const updateScroll = () => {
    shell?.classList.toggle('is-scrolled', window.scrollY > 12);
    waiting = false;
  };
  updateScroll();
  window.addEventListener('scroll', () => {
    if (!waiting) { waiting = true; window.requestAnimationFrame(updateScroll); }
  }, {passive:true});
  // Visual-only search until the product search route is implemented.
  document.getElementById('frontSearchForm')?.addEventListener('submit', (event) => event.preventDefault());
});
