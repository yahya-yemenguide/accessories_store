document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('mobileSidebar');
    const openBtn = document.getElementById('menuToggleBtn');
    const closeBtn = document.getElementById('sidebarCloseBtn');
    const backdrop = document.getElementById('sidebarBackdrop');

    if (!sidebar || !openBtn) return;

    const openSidebar = () => {
        sidebar.classList.add('is-open');
        sidebar.setAttribute('aria-hidden', 'false');
        openBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    };

    const closeSidebar = () => {
        sidebar.classList.remove('is-open');
        sidebar.setAttribute('aria-hidden', 'true');
        openBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    };

    openBtn.addEventListener('click', openSidebar);
    closeBtn?.addEventListener('click', closeSidebar);
    backdrop?.addEventListener('click', closeSidebar);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && sidebar.classList.contains('is-open')) {
            closeSidebar();
        }
    });

    sidebar.querySelectorAll('.sidebar-link').forEach((link) => {
        link.addEventListener('click', closeSidebar);
    });
});
