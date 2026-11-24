<header class="front-header" id="siteHeader">
    <span class="royal-silk-texture" aria-hidden="true"></span>
    <span class="royal-gloss-sweep" aria-hidden="true"></span>
    <div class="front-header-inner">
        <button type="button" class="menu-toggle-btn" id="menuToggleBtn" aria-label="فتح القائمة" aria-controls="mobileSidebar" aria-expanded="false">
            <span class="menu-lines" aria-hidden="true"><span></span><span></span><span></span></span>
        </button>
        <a class="brand-logo kurdi-brand" href="{{ url('/') }}" aria-label="دار الكردي للإكسسوارات - الرئيسية">
            <img class="kurdi-brand__mark" src="{{ asset('assets/images/front/dar-alkurdi-mark.png') }}" alt="" width="110" height="100">
            <span class="kurdi-brand__type"><strong>دار الكردي</strong><small>للإكسسوارات</small></span>
        </a>
        <nav class="mobile-actions" aria-label="روابط الحساب والتسوق">
            <a class="header-icon-btn header-account" href="#" aria-label="حسابي"><i class="bi bi-person" aria-hidden="true"></i></a>
            <a class="header-icon-btn" href="#" aria-label="المفضلة"><i class="bi bi-heart" aria-hidden="true"></i></a>
            <a class="header-icon-btn cart-btn" href="#" aria-label="سلة التسوق"><i class="bi bi-cart3" aria-hidden="true"></i><span class="badge-dot" aria-label="صفر عناصر">0</span></a>
        </nav>
        @include('front.components.search-bar')
    </div>
    <nav class="desktop-nav" aria-label="التنقل الرئيسي">
        <a class="desktop-nav-link active" href="{{ url('/') }}" aria-current="page"><i class="bi bi-house-door-fill" aria-hidden="true"></i><span>الرئيسية</span></a>
        <a class="desktop-nav-link" href="#"><i class="bi bi-grid" aria-hidden="true"></i><span>الأقسام</span></a>
        <a class="desktop-nav-link" href="#"><i class="bi bi-stars" aria-hidden="true"></i><span>المضاف حديثًا</span></a>
        <a class="desktop-nav-link" href="#"><i class="bi bi-award" aria-hidden="true"></i><span>الأكثر مبيعًا</span></a>
        <a class="desktop-nav-link" href="#"><i class="bi bi-tag-fill" aria-hidden="true"></i><span>العروض والخصومات</span></a>
    </nav>
    <span class="royal-center-jewel" aria-hidden="true">✦</span>
</header>
