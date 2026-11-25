/* Dar Al-Kurdi — royal stars: permanent jewels, one active circle every 5 seconds. */
document.addEventListener('DOMContentLoaded', () => {
  const section = document.getElementById('luxuryCategories');
  const track = section?.querySelector('[data-categories-track]');
  if (!track || track.dataset.royalStarsReady === '1') return;
  track.dataset.royalStarsReady = '1';
  const cards = Array.from(track.querySelectorAll('.category-card'));
  if (!cards.length) return;

  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  const interval = 5000;
  let selected = 0;
  let timer = null;
  let resumeTimer = null;
  let visible = true;
  let interacting = false;

  cards.forEach((card, i) => {
    const frame = card.querySelector('.category-frame');
    if (!frame) return;
    // Keep the gold orbit as a quiet permanent ornament, not five simultaneous spins.
    if (!frame.querySelector('.category-orbit')) {
      const orbit = document.createElement('span');
      orbit.className = 'category-orbit';
      orbit.setAttribute('aria-hidden', 'true');
      frame.appendChild(orbit);
    }
    if (!frame.querySelector('.dak-stars')) {
      const stars = document.createElement('span');
      stars.className = 'dak-stars';
      stars.setAttribute('aria-hidden', 'true');
      for (let n = 1; n <= 4; n++) {
        const star = document.createElement('span');
        star.className = `dak-star dak-star--${n}`;
        star.textContent = '✦';
        stars.appendChild(star);
      }
      frame.appendChild(stars);
    }
    card.addEventListener('pointerenter', e => {
      if (e.pointerType === 'touch') return;
      interacting = true;
      stop();
      select(i);
    });
    card.addEventListener('focusin', () => { interacting = true; stop(); select(i); });
  });

  // Slide only the horizontal categories strip. Never move the whole page.
  // getBoundingClientRect() works correctly in Chrome/Edge RTL, where scrollLeft
  // may be negative. It also avoids scrollIntoView() moving the document.
  function revealActiveCard() {
    if (track.scrollWidth <= track.clientWidth + 3) return;
    const cardRect = cards[selected].getBoundingClientRect();
    const trackRect = track.getBoundingClientRect();
    const offset = (cardRect.left + cardRect.width / 2) -
                   (trackRect.left + trackRect.width / 2);
    if (Math.abs(offset) < 2) return;
    track.scrollBy({
      left: offset,
      behavior: reduced.matches ? 'instant' : 'smooth'
    });
  }

  function select(i, moveTrack = false) {
    selected = (i + cards.length) % cards.length;
    cards.forEach((card, j) => card.classList.toggle('is-royal-active', j === selected));
    if (moveTrack) requestAnimationFrame(revealActiveCard);
  }
  function stop() { if (timer !== null) clearTimeout(timer); timer = null; }
  function canPlay() { return !reduced.matches && !document.hidden && visible && !interacting; }
  function cycle() {
    stop();
    if (!canPlay()) return;
    timer = setTimeout(() => { select(selected + 1, true); cycle(); }, interval);
  }
  function resume() { interacting = false; cycle(); }
  function resumeSoon() { clearTimeout(resumeTimer); resumeTimer = setTimeout(resume, 4200); }

  track.addEventListener('pointerleave', e => { if (e.pointerType !== 'touch') resume(); });
  track.addEventListener('focusout', e => { if (!track.contains(e.relatedTarget)) resume(); });
  track.addEventListener('touchstart', () => { interacting = true; stop(); clearTimeout(resumeTimer); }, {passive:true});
  track.addEventListener('touchend', resumeSoon, {passive:true});
  track.addEventListener('touchcancel', resumeSoon, {passive:true});
  document.addEventListener('visibilitychange', cycle);
  reduced.addEventListener?.('change', cycle);
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(entries => { visible = !!entries[0]?.isIntersecting; cycle(); }, {threshold:.10}).observe(section);
  }
  select(0);
  cycle();
});
