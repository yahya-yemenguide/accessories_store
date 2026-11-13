<footer class="ys-footer">
    <div class="ys-footer__ornament" aria-hidden="true"><span></span><b>♡</b><span></span></div>
    <button class="ys-back-top" type="button" aria-label="العودة إلى أعلى الصفحة" data-back-top>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 14 7-7 7 7"/></svg>
    </button>
    <div class="ys-footer__inner">
        <div class="ys-footer__social">
            <h2>تابعينا</h2>
            <div class="ys-social">
                <a href="#" aria-label="Instagram">◎</a><a href="#" aria-label="TikTok">♪</a><a href="#" aria-label="Snapchat">♟</a><a href="#" aria-label="WhatsApp">◉</a>
            </div>
        </div>
        <div class="ys-footer__column">
            <h2>معلومات مهمة</h2>
            <a href="#">سياسات المتجر</a>
            <a href="#">الشحن والتوصيل</a>
            <a href="#">الاستبدال والاسترجاع</a>
            <a href="#">الأسئلة الشائعة</a>
        </div>
        <div class="ys-footer__column">
            <h2>روابط سريعة</h2>
            <a href="{{ url('/') }}">الرئيسية</a>
            <a href="#categories">الأقسام</a>
            <a href="#new-arrivals">المضاف حديثاً</a>
            <a href="#best-sellers">الأكثر مبيعاً</a>
            <a href="#offers">العروض والخصومات</a>
        </div>
        <a class="ys-footer__brand" href="{{ url('/') }}" aria-label="Your Store">
            <img src="{{ asset('images/front/your-store-logo-footer.png') }}" alt="Your Store">
        </a>
    </div>
    <div class="ys-footer__copyright">
        <span></span>
        <p>Your Store © 2025 جميع الحقوق محفوظة - متجر Your Store</p>
        <span></span>
    </div>
</footer>
