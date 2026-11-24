<header class="front-header" id="siteHeader">
    <div class="front-header-inner">
        <button type="button" class="menu-toggle-btn" id="menuToggleBtn" aria-label="فتح القائمة" aria-controls="mobileSidebar" aria-expanded="false">
            <span class="menu-lines" aria-hidden="true"><span></span><span></span><span></span></span>
        </button>
        <a class="brand-logo" href="{{ url('/') }}" aria-label="YourStore - الرئيسية">
            <img src="{{ asset('assets/images/front/yourstore-reference-logo.png') }}" alt="YourStore - More than just accessories" width="244" height="62">
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
</header>

<style id="yourstore-royal-header-edge">

/* Royal edge: scoped to the current header only. No Vite, no JS changes. */
.front-sticky-shell {
  position: sticky !important;
  top: 0 !important;
  z-index: 1200 !important;
  overflow: visible !important;
  filter: drop-shadow(0 8px 12px rgba(42,18,9,.13)) !important;
}
.front-header {
  position: relative !important;
  overflow: visible !important;
  border-radius: 0 !important;
  box-shadow: none !important;
  isolation: isolate;
}
.front-header::after {
  content: "";
  position: absolute;
  top: calc(100% - 1px);
  right: 0;
  width: 100%;
  height: 29px;
  pointer-events: none;
  z-index: 2;
  background-image: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%201200%2038%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3ClinearGradient%20id%3D%22c%22%20x1%3D%220%22%20y1%3D%220%22%20x2%3D%221%22%20y2%3D%220%22%3E%3Cstop%20stop-color%3D%22%23fff1e7%22%2F%3E%3Cstop%20offset%3D%22.5%22%20stop-color%3D%22%23fff8f1%22%2F%3E%3Cstop%20offset%3D%221%22%20stop-color%3D%22%23ffefe1%22%2F%3E%3C%2FlinearGradient%3E%3ClinearGradient%20id%3D%22g%22%20x1%3D%220%22%20y1%3D%220%22%20x2%3D%221%22%20y2%3D%220%22%3E%3Cstop%20stop-color%3D%22%23e9bd78%22%2F%3E%3Cstop%20offset%3D%22.5%22%20stop-color%3D%22%23c99141%22%2F%3E%3Cstop%20offset%3D%221%22%20stop-color%3D%22%23ebbe80%22%2F%3E%3C%2FlinearGradient%3E%3C%2Fdefs%3E%3Cpath%20d%3D%22M0%200H1200V9%20C1010%2035%20840%2013%20650%2017%20C620%2018%20610%2029%20600%2033%20C590%2029%20580%2018%20550%2017%20C360%2013%20190%2035%200%209Z%22%20fill%3D%22url%28%23c%29%22%2F%3E%3Cpath%20d%3D%22M0%209%20C190%2035%20360%2013%20550%2017%20C580%2018%20590%2029%20600%2033%20C610%2029%20620%2018%20650%2017%20C840%2013%201010%2035%201200%209%22%20fill%3D%22none%22%20stroke%3D%22url%28%23g%29%22%20stroke-width%3D%222.4%22%2F%3E%3Cpath%20d%3D%22M0%204%20C190%2030%20360%208%20550%2012%20C580%2013%20590%2024%20600%2028%20C610%2024%20620%2013%20650%2012%20C840%208%201010%2030%201200%204%22%20fill%3D%22none%22%20stroke%3D%22%23fff%22%20stroke-opacity%3D%22.8%22%20stroke-width%3D%221%22%2F%3E%3C%2Fsvg%3E");
  background-repeat: no-repeat;
  background-size: 100% 100%;
  filter: drop-shadow(0 3px 3px rgba(57,25,11,.15));
}
/* Subtle jewel directly on the lower contour */
.front-header .desktop-nav::after {
  content: "✦";
  position: absolute;
  bottom: -32px;
  left: 50%;
  transform: translateX(-50%);
  font: 22px Georgia,serif;
  color: #dca858;
  text-shadow: 0 1px 0 #fff8eb,0 2px 5px rgba(103,53,23,.34);
  pointer-events: none;
  z-index: 4;
  animation: royalGlimmer 6s ease-in-out infinite;
}
.front-header-inner { transition: padding .32s ease, grid-template-rows .32s ease; }
/* Keep phone header compact: announcement + logo row + search + fine ribbon. */
@media (max-width: 599px) {
  .front-header-inner {
    grid-template-rows: 57px 45px !important;
    padding-top: 3px !important;
    padding-bottom: 5px !important;
    row-gap: 3px !important;
  }
  .brand-logo { min-height: 49px !important; }
  .brand-logo img { max-height: 55px !important; }
  .search-bar-form { height: 43px !important; }
  .front-header::after { height: 19px; }
  .front-header .desktop-nav::after { display: none; }
  .front-header::before { opacity: .32 !important; }
  .front-sticky-shell.is-scrolled { filter: drop-shadow(0 6px 14px rgba(42,18,9,.20)) !important; }
}
@media (max-width: 360px) {
  .front-header-inner { grid-template-rows: 53px 43px !important; }
  .brand-logo img { max-height: 50px !important; }
  .search-bar-form { height: 41px !important; }
  .front-header::after { height: 17px; }
}
@media (min-width: 600px) and (max-width: 1099px) {
  .front-header-inner { grid-template-rows: 70px 52px !important; padding-top: 7px !important; padding-bottom: 9px !important; }
  .front-header::after { height: 25px; }
}
@media (min-width: 1100px) {
  .front-header-inner { grid-template-rows: 82px !important; padding-top: 6px !important; padding-bottom: 1px !important; }
  .desktop-nav { min-height: 43px !important; padding-bottom: 5px !important; }
  .front-header::after { height: 31px; }
}
@keyframes royalGlimmer { 0%,82%,100% { opacity:.76;filter:brightness(1); } 89% { opacity:1;filter:brightness(1.4); } }
@media (prefers-reduced-motion: reduce) { .front-header .desktop-nav::after { animation: none; } .front-header-inner { transition: none; } }
</style>
