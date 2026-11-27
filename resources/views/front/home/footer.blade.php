{{-- Royal footer: dedicated decorative illustrations, no embedded text; design-only service links. --}}
<footer class="dkf" id="darFooter" dir="rtl" aria-label="تذييل دار الكردي للإكسسوارات">
  <svg class="dkf__crest-edge" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true">
    <defs><linearGradient id="dkfGoldEdge" x1="0" y1="0" x2="1" y2="0"><stop stop-color="#b66b29"/><stop offset=".24" stop-color="#ffe8a7"/><stop offset=".5" stop-color="#d89e50"/><stop offset=".74" stop-color="#ffe8a7"/><stop offset="1" stop-color="#b66b29"/></linearGradient></defs>
    <path d="M0 23 C158 7 234 76 362 38 C465 3 574 14 720 44 C866 14 975 3 1078 38 C1206 76 1282 7 1440 23 L1440 90 L0 90Z" fill="#35180f"/>
    <path d="M0 23 C158 7 234 76 362 38 C465 3 574 14 720 44 C866 14 975 3 1078 38 C1206 76 1282 7 1440 23" stroke="url(#dkfGoldEdge)" stroke-width="7" fill="none"/>
    <path d="M0 13 C158 -3 234 66 362 28 C465 -7 574 4 720 34 C866 4 975 -7 1078 28 C1206 66 1282 -3 1440 13" stroke="#ffecc3" stroke-opacity=".82" stroke-width="1.8" fill="none"/>
  </svg>
  <div class="dkf__glow" aria-hidden="true"></div>
  <div class="dkf__seal">
    <a href="{{ url('/') }}" aria-label="دار الكردي للإكسسوارات - الرئيسية">
      <img src="{{ asset('assets/images/front/dar-alkurdi-mark.png') }}" alt="" width="72" height="67">
      <strong>دار الكردي</strong><small>للإكسسوارات</small>
    </a>
  </div>
  <div class="dkf__inner">
    <div class="dkf__columns">
      <section class="dkf__group dkf__about">
        <h3><i class="bi bi-gem" aria-hidden="true"></i> عن المتجر</h3>
        <p>دار الكردي للإكسسوارات، وجهتك لاختيار الإكسسوارات والقطع الأنيقة التي تعكس ذوقك وتكمّل إطلالتك.</p>
        <div class="dkf__ornament-line" aria-hidden="true">✧ ━━ ✦ ━━ ✧</div>
      </section>
      <section class="dkf__group dkf__fold">
        <button class="dkf__toggle" type="button" aria-expanded="false" aria-controls="dkfShop"><span><i class="bi bi-layers" aria-hidden="true"></i> روابط المتجر</span><i class="bi bi-chevron-down dkf__chevron" aria-hidden="true"></i></button>
        <nav class="dkf__links" id="dkfShop" aria-label="روابط المتجر">
          <a href="{{ url('/') }}"><i class="bi bi-house-door-fill" aria-hidden="true"></i> الرئيسية</a>
          <a href="{{ url('/') }}#categories"><i class="bi bi-grid" aria-hidden="true"></i> الأقسام</a>
          <a href="{{ url('/') }}#featured-products"><i class="bi bi-stars" aria-hidden="true"></i> المضاف حديثًا</a>
          <a href="{{ url('/') }}#best-sellers"><i class="bi bi-award" aria-hidden="true"></i> الأكثر مبيعًا</a>
          <a href="{{ url('/') }}#akOffers"><i class="bi bi-tag-fill" aria-hidden="true"></i> العروض والخصومات</a>
        </nav>
      </section>
      <section class="dkf__group dkf__fold">
        <button class="dkf__toggle" type="button" aria-expanded="false" aria-controls="dkfCare"><span><i class="bi bi-headset" aria-hidden="true"></i> خدمة العملاء</span><i class="bi bi-chevron-down dkf__chevron" aria-hidden="true"></i></button>
        <div class="dkf__links dkf__not-links" id="dkfCare">
          <span><i class="bi bi-question-circle" aria-hidden="true"></i> الأسئلة الشائعة</span>
          <span><i class="bi bi-truck" aria-hidden="true"></i> معلومات التوصيل</span>
          <span><i class="bi bi-arrow-left-right" aria-hidden="true"></i> الاستبدال والاسترجاع</span>
          <span><i class="bi bi-shield-check" aria-hidden="true"></i> سياسة الخصوصية</span>
        </div>
      </section>
      <section class="dkf__group dkf__fold">
        <button class="dkf__toggle" type="button" aria-expanded="false" aria-controls="dkfContact"><span><i class="bi bi-chat-heart" aria-hidden="true"></i> تواصل معنا</span><i class="bi bi-chevron-down dkf__chevron" aria-hidden="true"></i></button>
        <div class="dkf__links dkf__not-links" id="dkfContact">
          <span><i class="bi bi-whatsapp" aria-hidden="true"></i> واتساب</span>
          <span><i class="bi bi-instagram" aria-hidden="true"></i> إنستجرام</span>
          <span><i class="bi bi-tiktok" aria-hidden="true"></i> تيك توك</span>
          <span><i class="bi bi-envelope" aria-hidden="true"></i> البريد الإلكتروني</span>
        </div>
      </section>
    </div>
    {{-- Two original standalone decorative assets: no text baked in, never cropped from website screenshots. --}}
    <img class="dkf__side-art dkf__side-art--left" src="{{ asset('assets/images/front/footer/footer-left-gift.webp') }}" alt="" aria-hidden="true" loading="lazy" width="900" height="800">
    <img class="dkf__side-art dkf__side-art--right" src="{{ asset('assets/images/front/footer/footer-right-diamonds.webp') }}" alt="" aria-hidden="true" loading="lazy" width="840" height="640">
    <div class="dkf__payments">
      <div class="dkf__wallet-wrap"><span class="dkf__wallet-heading"><i class="bi bi-wallet2" aria-hidden="true"></i> المحافظ الإلكترونية</span><div class="dkf__wallets" aria-label="أسماء محافظ للتصميم فقط، لم يتم تأكيد تفعيلها">
        <span class="dkf__wallet">جيب <small>Jaib</small></span><span class="dkf__wallet">جوالي <small>Jawali</small></span><span class="dkf__wallet">فلوسك <small>Floosak</small></span><span class="dkf__wallet">ون كاش <small>ONE Cash</small></span>
      </div></div>
      <p>© {{ date('Y') }} دار الكردي للإكسسوارات. جميع الحقوق محفوظة.</p>
    </div>
    <div class="dkf__bottom"><div class="dkf__credit"><span class="dkf__credit-label"><i class="bi bi-code-slash" aria-hidden="true"></i> تصميم وتطوير الموقع بواسطة</span><div class="dkf__credit-details"><strong lang="en" dir="ltr">Manar Jomaan</strong><a href="tel:773229574" dir="ltr"><i class="bi bi-telephone-fill" aria-hidden="true"></i> 773229574</a></div></div></div>
  </div>
</footer>
