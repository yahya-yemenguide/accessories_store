<div class="ys-drawer-overlay" data-menu-close aria-hidden="true"></div>
<aside class="ys-drawer" id="ys-mobile-drawer" aria-label="القائمة الجانبية" aria-hidden="true">
    <div class="ys-drawer__top">
        <button class="ys-drawer__close" type="button" aria-label="إغلاق القائمة" data-menu-close>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 5 14 14M19 5 5 19"/></svg>
        </button>
        <a class="ys-drawer__brand" href="{{ url('/') }}"><img src="{{ asset('images/front/your-store-logo.png') }}" alt="Your Store"></a>
    </div>

    <div class="ys-drawer__welcome">مرحباً بكِ في متجرنا <span aria-hidden="true">♡</span></div>

    <nav class="ys-drawer__nav" aria-label="روابط المتجر">
        <a href="{{ url('/') }}"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 11 9-8 9 8v10h-6v-6H9v6H3z"/></svg><span>الرئيسية</span><b>‹</b></a>
        <a href="#categories"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg><span>الأقسام</span><b>‹</b></a>
        <a href="#new-arrivals"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 2 2.2 6.2L21 6l-2.2 6.2L22 18l-7-1-3 5-3-5-7 1 3.2-5.8L3 6l6.8 2.2z"/></svg><span>المضاف حديثاً</span><b>‹</b></a>
        <a href="#best-sellers"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 2 2.3 5 5.5.6-4.1 3.8 1.1 5.4-4.8-2.7-4.8 2.7 1.1-5.4L4.2 7.6 9.7 7z"/></svg><span>الأكثر مبيعاً</span><b>‹</b></a>
        <a href="#offers"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2 15 4l4-.2.8 4 2.2 3.2-2.2 3.2-.8 4-4-.2-3 2-3-2-4 .2-.8-4L2 11l2.2-3.2.8-4 4 .2z"/><path d="m8 14 8-6"/></svg><span>العروض والخصومات</span><b>‹</b></a>
    </nav>

    <div class="ys-drawer__separator"><span></span>♡<span></span></div>
    <nav class="ys-drawer__nav ys-drawer__nav--secondary" aria-label="حسابك">
        <a href="#"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="7.5" r="3.5"/><path d="M4.5 21v-2a7.5 7.5 0 0 1 15 0v2z"/></svg><span>حسابي</span><b>‹</b></a>
        <a href="#"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 8.8c0 5-8.8 11-8.8 11s-8.8-6-8.8-11A4.7 4.7 0 0 1 12 6.2a4.7 4.7 0 0 1 8.8 2.6Z"/></svg><span>المفضلة</span><b>‹</b></a>
        <a href="#"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h8.2a2 2 0 0 0 1.9-1.4L21 8H6"/><circle cx="10" cy="20" r="1.3"/><circle cx="18" cy="20" r="1.3"/></svg><span>سلة التسوق</span><b>‹</b></a>
    </nav>
    <div class="ys-drawer__separator"><span></span>♡<span></span></div>
    <nav class="ys-drawer__nav ys-drawer__nav--secondary" aria-label="المساعدة والمعلومات">
        <a href="#"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 13a9 9 0 0 1 18 0v5h-4v-6h4M3 12v6h4v-6z"/></svg><span>تواصل معنا</span><b>‹</b></a>
        <a href="#"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 1 1 4.2 1.8c-1.2 1-1.7 1.4-1.7 3M12 17.5h.01"/></svg><span>الأسئلة الشائعة</span><b>‹</b></a>
        <a href="#"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7h.01"/></svg><span>من نحن</span><b>‹</b></a>
    </nav>

    <a class="ys-drawer__logout" href="#"><span>تسجيل الخروج</span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 4H4v16h6M14 8l4 4-4 4M8 12h10"/></svg></a>
    <div class="ys-social ys-social--drawer" aria-label="تابعينا">
        <a href="#" aria-label="Instagram">◎</a><a href="#" aria-label="TikTok">♪</a><a href="#" aria-label="Snapchat">♟</a><a href="#" aria-label="WhatsApp">◉</a>
    </div>
</aside>
