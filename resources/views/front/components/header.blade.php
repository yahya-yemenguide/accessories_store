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
            <a class="header-icon-btn header-account" href="#" aria-label="حسابي - قريبًا" data-pending-feature="حسابي"><i class="bi bi-person" aria-hidden="true"></i></a>
            <a class="header-icon-btn" href="#" aria-label="المفضلة - قريبًا" data-pending-feature="المفضلة"><i class="bi bi-heart" aria-hidden="true"></i></a>
            <a class="header-icon-btn cart-btn" href="#" aria-label="سلة التسوق - قريبًا" data-pending-feature="سلة التسوق"><i class="bi bi-cart3" aria-hidden="true"></i><span class="badge-dot" aria-label="صفر عناصر">0</span></a>
        </nav>
        @include('front.components.search-bar')
    </div>
    <nav class="desktop-nav" aria-label="التنقل الرئيسي">
        <a class="desktop-nav-link active" href="{{ url('/') }}" data-nav-section="home"><i class="bi bi-house-door-fill" aria-hidden="true"></i><span>الرئيسية</span></a>
        <div class="dk-nav-dropdown" id="dkDesktopCategories">
            <button type="button" class="desktop-nav-link dk-nav-dropdown__trigger" aria-expanded="false" aria-haspopup="true" aria-controls="dkDesktopCategoryMenu"><i class="bi bi-grid" aria-hidden="true"></i><span>الأقسام</span><i class="bi bi-chevron-down dk-nav-dropdown__chevron" aria-hidden="true"></i></button>
            <div class="dk-nav-dropdown__panel" id="dkDesktopCategoryMenu">
                <a href="{{ url('/') }}#luxuryCategories" class="dk-nav-dropdown__all"><i class="bi bi-grid-3x3-gap"></i> جميع الأقسام</a>
                <a href="{{ url('/') }}#dkCategoryPlated"><i class="bi bi-gem"></i> المطليات</a>
                <a href="{{ url('/') }}#dkCategorySilver"><i class="bi bi-stars"></i> الفضيات</a>
                <a href="{{ url('/') }}#dkCategoryWatches"><i class="bi bi-watch"></i> الساعات</a>
                <a href="{{ url('/') }}#dkCategoryZircon"><i class="bi bi-brilliance"></i> الزركونات</a>
                <a href="{{ url('/') }}#dkCategoryRings"><i class="bi bi-circle"></i> الخواتم</a>
            </div>
        </div>
        <a class="desktop-nav-link" href="{{ url('/') }}#featuredProducts" data-nav-section="featuredProducts"><i class="bi bi-stars" aria-hidden="true"></i><span>المضاف حديثًا</span></a>
        <a class="desktop-nav-link" href="{{ url('/') }}#akBestSellers" data-nav-section="akBestSellers"><i class="bi bi-award" aria-hidden="true"></i><span>الأكثر مبيعًا</span></a>
        <a class="desktop-nav-link" href="{{ url('/') }}#akOffers" data-nav-section="akOffers"><i class="bi bi-tag-fill" aria-hidden="true"></i><span>العروض والخصومات</span></a>
        <a class="desktop-nav-link" href="{{ url('/') }}#darContact" data-nav-section="darContact"><i class="bi bi-headset" aria-hidden="true"></i><span>تواصل معنا</span></a>
    </nav>
    <span class="royal-center-jewel" aria-hidden="true">✦</span>
</header>
<style>{!! file_get_contents(resource_path('css/front/royal-navigation.css')) !!}</style>
<script>{!! file_get_contents(resource_path('js/front/royal-navigation.js')) !!}</script>
