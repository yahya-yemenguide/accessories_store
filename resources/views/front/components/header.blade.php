<header class="front-header">
    <div class="header-inner">
        <div class="mobile-actions">
            <a href="#" class="header-icon-btn cart-btn" aria-label="سلة التسوق">
                <span class="badge-dot">0</span>
                <i class="bi bi-cart3"></i>
            </a>

            <a href="#" class="header-icon-btn" aria-label="المفضلة">
                <i class="bi bi-heart"></i>
            </a>

            <a href="#" class="header-icon-btn" aria-label="الحساب">
                <i class="bi bi-person"></i>
            </a>
        </div>

        <a href="#" class="brand-logo" aria-label="YourStore">
            <div class="brand-mark">
                <span class="brand-crown"><i class="bi bi-stars"></i></span>
                <span class="brand-face"><i class="bi bi-flower1"></i></span>
            </div>

            <div class="brand-text">
                <div class="brand-name">YourStore</div>
                <div class="brand-tag">MORE THAN JUST ACCESSORIES</div>
            </div>
        </a>

        <button type="button" class="menu-toggle-btn" id="menuToggleBtn" aria-label="فتح القائمة" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>
    </div>

    @include('front.components.search-bar')

    <nav class="desktop-nav">
        <a href="#" class="desktop-nav-link active"><i class="bi bi-house-door-fill"></i><span>الرئيسية</span></a>
        <a href="#" class="desktop-nav-link"><i class="bi bi-grid-3x3-gap-fill"></i><span>الأقسام</span></a>
        <a href="#" class="desktop-nav-link"><i class="bi bi-stars"></i><span>المضاف حديثًا</span></a>
        <a href="#" class="desktop-nav-link"><i class="bi bi-fire"></i><span>الأكثر مبيعًا</span></a>
        <a href="#" class="desktop-nav-link"><i class="bi bi-tag-fill"></i><span>العروض والخصومات</span></a>
    </nav>
</header>
