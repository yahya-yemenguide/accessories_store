{{-- Dar Al-Kurdi — mobile navigation only. Exactly the same six primary links as the desktop header. --}}
<aside class="mobile-sidebar dk-royal-drawer" id="mobileSidebar" aria-hidden="true" inert>
  <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
  <div class="sidebar-panel dk-royal-drawer__panel" role="dialog" aria-modal="true" aria-labelledby="sidebarTitle" tabindex="-1">
    <div class="dk-royal-drawer__glow" aria-hidden="true"></div>
    <div class="dk-royal-drawer__inner">
      <div class="sidebar-top dk-royal-drawer__top">
        <div class="dk-royal-drawer__identity">
          <img src="{{ asset('assets/images/front/dar-alkurdi-mark.png') }}" alt="" width="54" height="54">
          <span><strong>دار الكردي</strong><small>للإكسسوارات</small></span>
        </div>
        <h2 id="sidebarTitle" class="visually-hidden">القائمة الرئيسية - دار الكردي</h2>
        <button type="button" class="sidebar-close dk-royal-drawer__close" id="sidebarCloseBtn" aria-label="إغلاق القائمة">
          <i class="bi bi-x-lg" aria-hidden="true"></i>
        </button>
      </div>

      <div class="dk-royal-drawer__seal" aria-hidden="true"><span></span><b>✦</b><span></span></div>

      <nav class="sidebar-nav dk-royal-drawer__nav" aria-label="روابط المتجر">
        <a class="sidebar-link dk-royal-drawer__link" href="{{ url('/') }}">
          <span class="sidebar-item-icon"><i class="bi bi-house-door-fill" aria-hidden="true"></i></span><span>الرئيسية</span><i class="bi bi-arrow-up-left dk-royal-drawer__arrow" aria-hidden="true"></i>
        </a>

        <div class="dk-sidebar-categories dk-royal-drawer__categories" id="dkSidebarCategories">
          <button class="sidebar-link dk-sidebar-categories__toggle dk-royal-drawer__link dk-royal-drawer__toggle" type="button" aria-expanded="false" aria-controls="dkSidebarCategoryMenu">
            <span class="sidebar-item-icon"><i class="bi bi-grid-3x3-gap" aria-hidden="true"></i></span><span>الأقسام</span><i class="bi bi-chevron-down dk-royal-drawer__arrow" aria-hidden="true"></i>
          </button>
          <div class="dk-sidebar-categories__list dk-royal-drawer__subnav" id="dkSidebarCategoryMenu" hidden>
            <a class="dk-sidebar-subnav" href="{{ url('/') }}#luxuryCategories"><i class="bi bi-grid" aria-hidden="true"></i>كل الأقسام</a>
            <a class="dk-sidebar-subnav" href="{{ url('/') }}#dkCategoryPlated"><i class="bi bi-stars" aria-hidden="true"></i>المطليات</a>
            <a class="dk-sidebar-subnav" href="{{ url('/') }}#dkCategorySilver"><i class="bi bi-gem" aria-hidden="true"></i>الفضيات</a>
            <a class="dk-sidebar-subnav" href="{{ url('/') }}#dkCategoryWatches"><i class="bi bi-watch" aria-hidden="true"></i>الساعات</a>
            <a class="dk-sidebar-subnav" href="{{ url('/') }}#dkCategoryZircon"><i class="bi bi-diamond" aria-hidden="true"></i>الزركونات</a>
            <a class="dk-sidebar-subnav" href="{{ url('/') }}#dkCategoryRings"><i class="bi bi-circle" aria-hidden="true"></i>الخواتم</a>
          </div>
        </div>

        <a class="sidebar-link dk-royal-drawer__link" href="{{ url('/') }}#featuredProducts">
          <span class="sidebar-item-icon"><i class="bi bi-stars" aria-hidden="true"></i></span><span>المضاف حديثًا</span><i class="bi bi-arrow-up-left dk-royal-drawer__arrow" aria-hidden="true"></i>
        </a>
        <a class="sidebar-link dk-royal-drawer__link" href="{{ url('/') }}#akBestSellers">
          <span class="sidebar-item-icon"><i class="bi bi-award" aria-hidden="true"></i></span><span>الأكثر مبيعًا</span><i class="bi bi-arrow-up-left dk-royal-drawer__arrow" aria-hidden="true"></i>
        </a>
        <a class="sidebar-link dk-royal-drawer__link" href="{{ url('/') }}#akOffers">
          <span class="sidebar-item-icon"><i class="bi bi-tag" aria-hidden="true"></i></span><span>العروض والخصومات</span><i class="bi bi-arrow-up-left dk-royal-drawer__arrow" aria-hidden="true"></i>
        </a>
        <a class="sidebar-link dk-royal-drawer__link" href="{{ url('/') }}#darContact">
          <span class="sidebar-item-icon"><i class="bi bi-envelope-paper-heart" aria-hidden="true"></i></span><span>تواصل معنا</span><i class="bi bi-arrow-up-left dk-royal-drawer__arrow" aria-hidden="true"></i>
        </a>
      </nav>
      <div class="dk-royal-drawer__signature" aria-hidden="true"><span>✧</span> DAR AL-KURDI <span>✧</span></div>
    </div>
  </div>
</aside>
<style data-dk-royal-drawer>{!! file_get_contents(resource_path('css/front/sidebar-royal-v2.css')) !!}</style>
