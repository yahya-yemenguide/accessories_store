<header class="ys-header">
    <div class="ys-header__main">
        <div class="ys-header__actions" aria-label="روابط الحساب والتسوق">
            <a class="ys-icon-link ys-cart-link" href="#" aria-label="سلة التسوق">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h8.2a2 2 0 0 0 1.9-1.4L21 8H6"/><circle cx="10" cy="20" r="1.3"/><circle cx="18" cy="20" r="1.3"/></svg><span class="ys-cart-count">0</span>
            </a>
            <a class="ys-icon-link" href="#" aria-label="المفضلة">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 8.8c0 5-8.8 11-8.8 11s-8.8-6-8.8-11A4.7 4.7 0 0 1 12 6.2a4.7 4.7 0 0 1 8.8 2.6Z"/></svg>
            </a>
            <a class="ys-icon-link" href="#" aria-label="حسابي">
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="7.5" r="3.5"/><path d="M4.5 21v-2a7.5 7.5 0 0 1 15 0v2z"/></svg>
            </a>
        </div>

        <a class="ys-brand ys-brand--header" href="{{ url('/') }}" aria-label="Your Store - الرئيسية">
            <img src="{{ asset('images/front/your-store-logo.png') }}" alt="Your Store">
        </a>

        <form class="ys-search" action="{{ url('/') }}" method="get" role="search">
            <button type="submit" aria-label="بحث">
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.8"/><path d="m16 16 5 5"/></svg>
            </button>
            <input type="search" name="q" placeholder="ابحثي عن منتجك المفضل..." aria-label="ابحثي عن منتجك المفضل">
        </form>

        <button class="ys-menu-toggle" type="button" aria-label="فتح القائمة" aria-controls="ys-mobile-drawer" aria-expanded="false" data-menu-open>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
        </button>
    </div>

    <nav class="ys-nav" aria-label="القائمة الرئيسية">
        <a class="is-current" href="{{ url('/') }}"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 11 9-8 9 8v10h-6v-6H9v6H3z"/></svg>الرئيسية</a>
        <a href="#categories"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>الأقسام</a>
        <a href="#new-arrivals"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 2 2.2 6.2L21 6l-2.2 6.2L22 18l-7-1-3 5-3-5-7 1 3.2-5.8L3 6l6.8 2.2z"/></svg>المضاف حديثاً</a>
        <a href="#best-sellers"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 2 2.3 5 5.5.6-4.1 3.8 1.1 5.4-4.8-2.7-4.8 2.7 1.1-5.4L4.2 7.6 9.7 7z"/></svg>الأكثر مبيعاً</a>
        <a href="#offers"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2 15 4l4-.2.8 4 2.2 3.2-2.2 3.2-.8 4-4-.2-3 2-3-2-4 .2-.8-4L2 11l2.2-3.2.8-4 4 .2z"/><path d="m8 14 8-6M8.5 8.5h.01M15.5 14.5h.01"/></svg>العروض والخصومات</a>
    </nav>
</header>
