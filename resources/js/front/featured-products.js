document.addEventListener('DOMContentLoaded', () => {
  const viewport = document.getElementById('dkProductsViewport');
  const ruler = document.getElementById('dkProductsRuler');
  if (!viewport || !ruler) return;
  const fill = ruler.querySelector('.dk-products__ruler-fill');
  const thumb = ruler.querySelector('.dk-products__ruler-thumb');
  const line = ruler.querySelector('.dk-products__ruler-line');
  let isDragging = false;
  const maxScroll = () => Math.max(0, viewport.scrollWidth - viewport.clientWidth);
  function update() {
    const max = maxScroll();
    // RTL scrollLeft is negative in modern browsers.
    const p = max ? Math.min(1, Math.max(0, Math.abs(viewport.scrollLeft) / max)) : 0;
    fill.style.width = (p * 100) + '%';
    thumb.style.right = (p * 100) + '%';
    ruler.setAttribute('aria-valuenow', String(Math.round(p * 100)));
  }
  function move(event) {
    const rect = line.getBoundingClientRect();
    const p = Math.min(1, Math.max(0, (rect.right - event.clientX) / rect.width));
    viewport.scrollTo({left: -p * maxScroll(), behavior: isDragging ? 'instant' : 'smooth'});
    update();
  }
  ruler.addEventListener('pointerdown', e => { isDragging = true; ruler.setPointerCapture(e.pointerId); move(e); });
  ruler.addEventListener('pointermove', e => { if (isDragging) move(e); });
  ruler.addEventListener('pointerup', () => { isDragging = false; });
  ruler.addEventListener('pointercancel', () => { isDragging = false; });
  ruler.addEventListener('keydown', e => {
    const step = Math.max(180, viewport.clientWidth * .45);
    if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
      e.preventDefault(); viewport.scrollBy({left: e.key === 'ArrowLeft' ? -step : step, behavior:'smooth'});
    } else if (e.key === 'Home') {e.preventDefault();viewport.scrollTo({left:0,behavior:'smooth'});}
    else if (e.key === 'End') {e.preventDefault();viewport.scrollTo({left:-maxScroll(),behavior:'smooth'});}
  });
  viewport.addEventListener('scroll', update, {passive:true});
  window.addEventListener('resize', update); update();
  // Demo-only favorite interactions. No persistence or cart integration yet.
  viewport.querySelectorAll('.dk-product__heart').forEach(button => {
    button.addEventListener('click', () => {
      const active = button.getAttribute('aria-pressed') === 'true';
      button.setAttribute('aria-pressed', String(!active));
      button.querySelector('i').className = !active ? 'bi bi-heart-fill' : 'bi bi-heart';
    });
  });
  viewport.querySelectorAll('.dk-product__cart').forEach(button => {
    button.addEventListener('click', () => {
      button.animate([{transform:'scale(1)'},{transform:'scale(.88)'},{transform:'scale(1)'}], {duration:320});
      button.title = 'السلة ستعمل عند ربط المتجر بقاعدة البيانات';
    });
  });
});
