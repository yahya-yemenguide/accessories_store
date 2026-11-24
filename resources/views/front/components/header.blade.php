<header class="front-header" id="siteHeader">
  <div class="header-inner">
    <button type="button" class="menu-toggle-btn" id="menuToggleBtn" aria-label="فتح القائمة" aria-controls="mobileSidebar" aria-expanded="false"><i class="bi bi-list" aria-hidden="true"></i></button>
    <a class="brand-logo" href="{{ url('/') }}" aria-label="YourStore - الرئيسية"><img src="{{ asset('assets/images/front/yourstore-reference-logo.png') }}" alt="YourStore - More than just accessories" width="244" height="62"></a>
    <div class="mobile-actions" aria-label="روابط المتجر">
      <a class="header-icon-btn" href="#" aria-label="حسابي"><i class="bi bi-person" aria-hidden="true"></i></a>
      <a class="header-icon-btn" href="#" aria-label="المفضلة"><i class="bi bi-heart" aria-hidden="true"></i></a>
      <a class="header-icon-btn cart-btn" href="#" aria-label="سلة التسوق"><i class="bi bi-cart3" aria-hidden="true"></i><span class="badge-dot" aria-label="صفر عناصر">0</span></a>
    </div>
  </div>
  @include('front.components.search-bar')
  <nav class="desktop-nav" aria-label="التنقل الرئيسي">
    <a class="desktop-nav-link active" href="{{ url('/') }}" aria-current="page"><i class="bi bi-house-door-fill" aria-hidden="true"></i>الرئيسية</a>
    <a class="desktop-nav-link" href="#"><i class="bi bi-grid" aria-hidden="true"></i>الأقسام</a>
    <a class="desktop-nav-link" href="#"><i class="bi bi-stars" aria-hidden="true"></i>المضاف حديثًا</a>
    <a class="desktop-nav-link" href="#"><i class="bi bi-fire" aria-hidden="true"></i>الأكثر مبيعًا</a>
    <a class="desktop-nav-link" href="#"><i class="bi bi-tag-fill" aria-hidden="true"></i>العروض والخصومات</a>
  </nav>
</header>
