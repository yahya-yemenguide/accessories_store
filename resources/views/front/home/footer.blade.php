{{-- دار الكردي | Footer visual design only --}}
<footer class="akf" id="darFooter" dir="rtl" aria-label="تذييل دار الكردي للإكسسوارات">
  <svg class="akf__wave" viewBox="0 0 1440 72" preserveAspectRatio="none" aria-hidden="true"><defs><linearGradient id="akfGold" x2="0" y2="1"><stop stop-color="#fff1cb"/><stop offset=".32" stop-color="#d29845"/><stop offset=".68" stop-color="#f5d99f"/><stop offset="1" stop-color="#a86629"/></linearGradient></defs><path d="M0 25 Q115 3 236 28 T480 30 Q610 38 720 12 Q830 38 960 30 T1204 28 T1440 25 L1440 72 H0Z" fill="#35180f"/><path d="M0 25 Q115 3 236 28 T480 30 Q610 38 720 12 Q830 38 960 30 T1204 28 T1440 25" stroke="url(#akfGold)" stroke-width="6" fill="none"/><path d="M0 17 Q115 -5 236 20 T480 22 Q610 30 720 4 Q830 30 960 22 T1204 20 T1440 17" stroke="#ffefc8" stroke-opacity=".65" stroke-width="1.5" fill="none"/></svg>
  <div class="akf__container">
    <div class="akf__brandline">
      <a class="akf__brand" href="{{ url('/') }}" aria-label="دار الكردي للإكسسوارات - الرئيسية"><span class="akf__brand-inner"><img src="{{ asset('assets/images/front/dar-alkurdi-mark.png') }}" alt="" width="80" height="78"><strong>دار الكردي</strong><small>للإكسسوارات</small></span></a>
      <div class="akf__tagline"><span aria-hidden="true">✦</span> أناقة تليق بذوقك <span aria-hidden="true">✦</span></div>
    </div>
    <div class="akf__main">
      <div class="akf__columns">
        <section class="akf__column akf__about">
          <h3 class="akf__heading"><i class="bi bi-gem" aria-hidden="true"></i> عن المتجر</h3>
          <p>دار الكردي للإكسسوارات، وجهتك لاختيار الإكسسوارات والقطع الأنيقة التي تعكس ذوقك وتكمّل إطلالتك.</p>
          <div class="akf__small-rule" aria-hidden="true">✧ ── ✦ ── ✧</div>
        </section>
        <section class="akf__column akf__fold">
          <button type="button" class="akf__heading akf__toggle" aria-expanded="false" aria-controls="akfNav"><span><i class="bi bi-grid" aria-hidden="true"></i> روابط المتجر</span><i class="bi bi-chevron-down akf__arrow" aria-hidden="true"></i></button>
          <nav class="akf__links" id="akfNav" aria-label="روابط المتجر">
            <a href="{{ url('/') }}"><i class="bi bi-house-door" aria-hidden="true"></i> الرئيسية</a>
            <a href="{{ url('/') }}#categories"><i class="bi bi-grid" aria-hidden="true"></i> الأقسام</a>
            <a href="{{ url('/') }}#featured-products"><i class="bi bi-stars" aria-hidden="true"></i> المضاف حديثًا</a>
            <a href="{{ url('/') }}#best-sellers"><i class="bi bi-award" aria-hidden="true"></i> الأكثر مبيعًا</a>
            <a href="{{ url('/') }}#akOffers"><i class="bi bi-tag" aria-hidden="true"></i> العروض والخصومات</a>
          </nav>
        </section>
        <section class="akf__column akf__fold">
          <button type="button" class="akf__heading akf__toggle" aria-expanded="false" aria-controls="akfCare"><span><i class="bi bi-headset" aria-hidden="true"></i> خدمة العملاء</span><i class="bi bi-chevron-down akf__arrow" aria-hidden="true"></i></button>
          <div class="akf__links akf__pending" id="akfCare"><span><i class="bi bi-question-circle" aria-hidden="true"></i> الأسئلة الشائعة</span><span><i class="bi bi-truck" aria-hidden="true"></i> معلومات التوصيل</span><span><i class="bi bi-arrow-left-right" aria-hidden="true"></i> الاستبدال والاسترجاع</span><span><i class="bi bi-shield-check" aria-hidden="true"></i> سياسة الخصوصية</span></div>
        </section>
        <section class="akf__column akf__fold">
          <button type="button" class="akf__heading akf__toggle" aria-expanded="false" aria-controls="akfSocial"><span><i class="bi bi-chat-heart" aria-hidden="true"></i> تواصل معنا</span><i class="bi bi-chevron-down akf__arrow" aria-hidden="true"></i></button>
          <div class="akf__links akf__pending" id="akfSocial"><span><i class="bi bi-whatsapp" aria-hidden="true"></i> واتساب</span><span><i class="bi bi-instagram" aria-hidden="true"></i> إنستجرام</span><span><i class="bi bi-tiktok" aria-hidden="true"></i> تيك توك</span><span><i class="bi bi-envelope" aria-hidden="true"></i> البريد الإلكتروني</span></div>
        </section>
      </div>
    </div>
    <div class="akf__divider" aria-hidden="true"><span>✦</span></div>
    <div class="akf__payment-zone"><span class="akf__payment-title"><i class="bi bi-wallet2" aria-hidden="true"></i> المحافظ الإلكترونية</span><div class="akf__wallets" aria-label="أسماء المحافظ في نموذج التصميم، يُراجع توفرها قبل الإطلاق"><span>جيب <small>Jaib</small></span><span>جوالي <small>Jawali</small></span><span>فلوسك <small>Floosak</small></span><span>ون كاش <small>ONE Cash</small></span></div></div>
    <div class="akf__base"><p>© {{ date('Y') }} دار الكردي للإكسسوارات — جميع الحقوق محفوظة</p><div class="akf__credit"><span><i class="bi bi-code-slash" aria-hidden="true"></i> تصميم وتطوير الموقع بواسطة</span><strong lang="en">Manar Jomaan</strong><a href="tel:773229574" dir="ltr"><i class="bi bi-telephone" aria-hidden="true"></i> 773229574</a></div></div>
  </div>
</footer>
