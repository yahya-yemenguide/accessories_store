document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');

    if (searchInput) {
        searchInput.addEventListener('focus', () => {
            searchInput.closest('.search-bar-form')?.classList.add('is-focused');
        });

        searchInput.addEventListener('blur', () => {
            searchInput.closest('.search-bar-form')?.classList.remove('is-focused');
        });
    }
});
