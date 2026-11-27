/* Dar Al-Kurdi — Royal gallery: sequential gold light, accessible mouse-only depth */
(() => {
  'use strict';
  function init() {
    const section = document.getElementById('darWhyChoose');
    if (!section || section.dataset.dwInit === '1') return;
    section.dataset.dwInit = '1';
    const cards = [...section.querySelectorAll('.dkw-royal__card')];
    if (!cards.length) return;
    const reduced = matchMedia('(prefers-reduced-motion: reduce)');
    const fine = matchMedia('(hover: hover) and (pointer: fine)');
    let visible = true, current = 0, timer = null, hovered = false;
    cards.forEach((card, i) => card.style.setProperty('--dkw-delay', `${-i * 0.8}s`));
    function choose(i) {
      current = ((i % cards.length) + cards.length) % cards.length;
      cards.forEach((card, j) => card.classList.toggle('is-lit', j === current));
    }
    function stop() { if (timer !== null) { clearInterval(timer); timer = null; } }
    function play() {
      stop();
      if (document.hidden || !visible || reduced.matches || hovered) return;
      choose(current);
      timer = setInterval(() => choose(current + 1), 4700);
    }
    cards.forEach((card, i) => {
      card.addEventListener('pointerenter', e => {
        if (e.pointerType !== 'mouse') return;
        hovered = true; stop(); choose(i);
      });
      card.addEventListener('pointerleave', () => {
        hovered = false;
        card.style.removeProperty('--dkw-rx');
        card.style.removeProperty('--dkw-ry');
        play();
      });
      card.addEventListener('pointermove', e => {
        if (!fine.matches || reduced.matches || e.pointerType !== 'mouse') return;
        const rect = card.getBoundingClientRect();
        card.style.setProperty('--dkw-rx', `${((0.5 - (e.clientY - rect.top) / rect.height) * 3).toFixed(2)}deg`);
        card.style.setProperty('--dkw-ry', `${(((e.clientX - rect.left) / rect.width - 0.5) * 4).toFixed(2)}deg`);
      }, {passive:true});
      card.addEventListener('focusin', () => {hovered = true; stop(); choose(i);});
      card.addEventListener('focusout', e => { if (!card.contains(e.relatedTarget)) { hovered = false; play(); } });
    });
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver(entries => {
        visible = entries.some(entry => entry.isIntersecting); play();
      }, {threshold:0.12});
      observer.observe(section);
    }
    document.addEventListener('visibilitychange', play);
    reduced.addEventListener?.('change', play);
    play();
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init, {once:true});
  else init();
})();
