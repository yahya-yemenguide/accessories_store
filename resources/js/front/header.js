document.addEventListener('DOMContentLoaded', () => {
  // Search is visual-only until the products/search route is implemented.
  const form = document.getElementById('frontSearchForm');
  form?.addEventListener('submit', event => event.preventDefault());
});
