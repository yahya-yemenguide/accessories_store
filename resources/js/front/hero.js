document.addEventListener('DOMContentLoaded', () => {
  const hero = document.getElementById('ysHero');
  if (!hero) return;
  const slides = [...hero.querySelectorAll('.ys-hero__slide')];
  const dots = [...hero.querySelectorAll('.ys-hero__dot')];
  if (!slides.length || slides.length !== dots.length) return;
  const delay = 5000;
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  let active = 0;
  let timer = null;
  let onScreen = true;
  let userHover = false;
  let touchStart = null;
  function stop() { if (timer !== null) { clearTimeout(timer); timer = null; } hero.classList.remove('is-playing'); }
  function canPlay() { return !document.hidden && onScreen && !userHover && !reducedMotion.matches; }
  function schedule() {
    stop();
    if (!canPlay()) return;
    // Restart the progress bar on each new slide.
    void hero.offsetWidth;
    hero.classList.add('is-playing');
    timer = window.setTimeout(() => show((active + 1) % slides.length), delay);
  }
  function show(index) {
    active = (index + slides.length) % slides.length;
    slides.forEach((slide, i) => {
      const selected = i === active;
      slide.classList.toggle('is-current', selected);
      slide.setAttribute('aria-hidden', String(!selected));
      slide.toggleAttribute('inert', !selected);
    });
    dots.forEach((dot, i) => { const selected = i === active; dot.classList.toggle('is-current', selected); dot.setAttribute('aria-pressed', String(selected)); });
    schedule();
  }
  dots.forEach((dot, i) => dot.addEventListener('click', () => show(i)));
  hero.addEventListener('mouseenter', () => { userHover = true; stop(); });
  hero.addEventListener('mouseleave', () => { userHover = false; schedule(); });
  hero.addEventListener('focusin', () => { userHover = true; stop(); });
  hero.addEventListener('focusout', e => { if (!hero.contains(e.relatedTarget)) { userHover = false; schedule(); } });
  hero.addEventListener('touchstart', e => { touchStart = e.touches[0]?.clientX ?? null; }, {passive:true});
  hero.addEventListener('touchend', e => { if (touchStart === null) return; const end = e.changedTouches[0]?.clientX ?? touchStart; const delta = end - touchStart; touchStart = null; if (Math.abs(delta) > 65) show(active + (delta < 0 ? 1 : -1)); }, {passive:true});
  document.addEventListener('visibilitychange', schedule);
  reducedMotion.addEventListener?.('change', schedule);
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(entries => { onScreen = entries[0].isIntersecting; schedule(); }, {threshold:0.15});
    observer.observe(hero);
  }
  show(0);
});
