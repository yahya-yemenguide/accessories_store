/* Dar Al Kurdi V5 — visible 5-step royal lighting; no global scroll changes. */
document.addEventListener('DOMContentLoaded', () => {
  const section = document.querySelector('#luxuryCategories');
  const track = section?.querySelector('[data-categories-track]');
  if (!track) return;
  const cards = [...track.querySelectorAll('.category-card')];
  if (!cards.length) return;
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  let selected = 0;
  let timer = null;
  let visible = true;
  let paused = false;
  let userResumeTimer = null;
  const interval = 3200;

  cards.forEach((card, i) => {
    const frame = card.querySelector('.category-frame');
    if (frame && !frame.querySelector('.category-orbit')) {
      const spark = document.createElement('span');
      spark.className = 'category-orbit';
      spark.setAttribute('aria-hidden', 'true');
      spark.style.setProperty('--orbit-delay', `${-i * 1.1}s`);
      frame.append(spark);
    }
    card.addEventListener('pointerenter', () => { paused = true; clearTimer(); select(i, false); });
    card.addEventListener('focusin', () => { paused = true; clearTimer(); select(i, false); });
  });

  function clearTimer() { if (timer !== null) clearTimeout(timer); timer = null; }
  function canPlay() { return !document.hidden && visible && !paused && !reduced.matches; }
  function cycle() {
    clearTimer();
    if (!canPlay()) return;
    timer = setTimeout(() => { select((selected + 1) % cards.length, true); cycle(); }, interval);
  }
  function select(i, autoMove) {
    selected = (i + cards.length) % cards.length;
    cards.forEach((card, j) => card.classList.toggle('is-royal-active', j === selected));
    if (autoMove && track.scrollWidth > track.clientWidth + 8) {
      cards[selected].scrollIntoView({behavior:'smooth',block:'nearest',inline:'center'});
    }
  }
  function resume() { paused = false; cycle(); }
  track.addEventListener('pointerleave', resume);
  track.addEventListener('focusout', e => { if (!track.contains(e.relatedTarget)) resume(); });
  track.addEventListener('touchstart', () => { paused = true; clearTimer(); }, {passive:true});
  track.addEventListener('touchend', () => { clearTimeout(userResumeTimer); userResumeTimer = setTimeout(resume, 4500); }, {passive:true});
  document.addEventListener('visibilitychange', cycle);
  reduced.addEventListener?.('change', cycle);
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(entries => { visible = !!entries[0]?.isIntersecting; cycle(); }, {threshold: .1}).observe(section);
  }
  select(0, false);
  cycle();
});
