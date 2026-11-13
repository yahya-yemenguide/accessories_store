(() => {
    'use strict';

    const drawer = document.getElementById('ys-mobile-drawer');
    const openButton = document.querySelector('[data-menu-open]');
    const closeTargets = document.querySelectorAll('[data-menu-close]');
    const body = document.body;

    if (drawer && openButton) {
        const setDrawer = (isOpen) => {
            drawer.classList.toggle('is-open', isOpen);
            document.querySelector('.ys-drawer-overlay')?.classList.toggle('is-visible', isOpen);
            drawer.setAttribute('aria-hidden', String(!isOpen));
            openButton.setAttribute('aria-expanded', String(isOpen));
            body.classList.toggle('ys-menu-open', isOpen);
            if (isOpen) {
                drawer.querySelector('[data-menu-close]')?.focus();
            } else {
                openButton.focus();
            }
        };

        openButton.addEventListener('click', () => setDrawer(true));
        closeTargets.forEach((target) => target.addEventListener('click', (event) => {
            if (target.classList.contains('ys-drawer-overlay') || target.closest('.ys-drawer__close')) {
                event.preventDefault();
                setDrawer(false);
            }
        }));

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && drawer.classList.contains('is-open')) {
                setDrawer(false);
            }
        });

        drawer.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                if (window.matchMedia('(max-width: 991px)').matches) setDrawer(false);
            });
        });
    }

    document.querySelector('[data-back-top]')?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
})();
