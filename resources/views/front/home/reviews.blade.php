{{-- دار الكردي | تصميم قسم الآراء فقط — دون تخزين أو نشر --}}
<section id="darReviews" class="dk-review" dir="rtl" aria-labelledby="dkReviewTitle">
  <div class="dk-review__ambient" aria-hidden="true"></div>
  <div class="dk-review__inner">
    <header class="dk-review__header">
      <div class="dk-review__brandmark" aria-hidden="true">♛</div>
      <div class="dk-review__headline">
        <h2 id="dkReviewTitle">آراء <em>عميلاتنا</em></h2>
      </div>
      <button class="dk-review__write-pill" type="button" data-dkr-open aria-haspopup="dialog"><span aria-hidden="true">✎</span> اكتبي رأيك</button>
    </header>

    <div class="dk-review__showcase">
      <span class="dk-review__decor dk-review__decor--right" aria-hidden="true">✦</span>
      <span class="dk-review__decor dk-review__decor--left" aria-hidden="true">✦</span>
      <button class="dk-review__arrow dk-review__arrow--previous" type="button" data-dkr-prev aria-label="الرأي السابق"><span aria-hidden="true">❯</span></button>
      <div class="dk-review__stage" data-dkr-stage aria-live="polite">
        @php
          $demoReviews = [
            ['letter'=>'س','name'=>'عميلة تجريبية ١','kind'=>'رأي عام','stars'=>5,'message'=>'هنا بيظهر رأي العميلة بعد برمجة الموقع. هذا النص مجرد معاينة لشكل البطاقة الملكية وألوانها وتفاصيلها.'],
            ['letter'=>'م','name'=>'عميلة تجريبية ٢','kind'=>'رأي عام','stars'=>4,'message'=>'هذي معاينة ثانية توضّح شكل النجوم ووسم المشتري الموثّق. الربط الفعلي بالطلبات بننفّذه في مرحلة البرمجة.'],
            ['letter'=>'ر','name'=>'عميلة تجريبية ٣','kind'=>'رأي عام','stars'=>2,'message'=>'هذا مثال شكلي لرأي بنجمتين، عشان نوضّح إن الآراء السلبية والإيجابية بتظهر بنفس الشكل دون تمييز.'],
            ['letter'=>'ن','name'=>'عميلة تجريبية ٤','kind'=>'رأي عام','stars'=>3,'message'=>'يمكن التنقّل بين الآراء بالسهمين أو بالسحب على الهاتف. الآراء المعروضة هنا أمثلة للتصميم وليست شهادات حقيقية.'],
          ];
        @endphp
        @foreach($demoReviews as $i => $review)
          <article class="dk-review__card" data-dkr-card data-dkr-position="{{ $i === 0 ? 'center' : 'hidden' }}" aria-hidden="{{ $i === 0 ? 'false' : 'true' }}" aria-label="رأي تجريبي {{ $i+1 }}">
            <svg class="dk-review__frame" viewBox="0 0 900 390" preserveAspectRatio="none" aria-hidden="true">
              <defs>
                <linearGradient id="dkrFrame{{ $i }}" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#a76d28"/><stop offset=".22" stop-color="#ffe6a5"/><stop offset=".5" stop-color="#ca9040"/><stop offset=".73" stop-color="#fff1bf"/><stop offset="1" stop-color="#a76b28"/></linearGradient>
                <linearGradient id="dkrInside{{ $i }}" x1="0" y1="0" x2=".3" y2="1"><stop offset="0" stop-color="#fffdf8"/><stop offset=".6" stop-color="#fff7ea"/><stop offset="1" stop-color="#efdbc1"/></linearGradient>
                <filter id="dkrGlow{{ $i }}" x="-20%" y="-20%" width="140%" height="150%"><feGaussianBlur stdDeviation="6"/></filter>
              </defs>
              <path d="M104 15 Q52 10 44 59 Q4 65 8 105 L8 286 Q7 330 49 336 Q57 379 108 375 Q450 361 792 375 Q844 379 852 335 Q893 329 892 285 L892 106 Q893 66 853 59 Q846 10 793 15 Q450 42 104 15Z" fill="#d5a25e" opacity=".43" transform="translate(0 6)" filter="url(#dkrGlow{{ $i }})"/>
              <path d="M104 15 Q52 10 44 59 Q4 65 8 105 L8 286 Q7 330 49 336 Q57 379 108 375 Q450 361 792 375 Q844 379 852 335 Q893 329 892 285 L892 106 Q893 66 853 59 Q846 10 793 15 Q450 42 104 15Z" fill="url(#dkrFrame{{ $i }})"/>
              <path d="M105 23 Q62 20 56 69 Q18 72 18 110 L18 280 Q18 320 59 324 Q65 367 110 366 Q450 352 790 366 Q835 367 841 324 Q881 320 881 280 L881 110 Q881 72 844 69 Q837 20 795 23 Q450 50 105 23Z" fill="url(#dkrInside{{ $i }})" stroke="#fff9e7" stroke-width="3"/>
              <path d="M113 31 Q73 29 67 78 Q28 81 28 114 L28 274 Q28 309 69 313 Q74 354 116 355 Q450 342 784 355 Q826 354 831 313 Q871 309 871 274 L871 114 Q871 81 832 78 Q826 29 788 31 Q450 58 113 31Z" fill="none" stroke="url(#dkrFrame{{ $i }})" stroke-width="2"/>
            </svg>
            <div class="dk-review__card-layout">
              <div class="dk-review__jewel dk-review__store-identity" aria-label="دار الكردي للإكسسوارات">
                <span class="dk-review__jewel-halo" aria-hidden="true"></span>
                <img class="dk-review__store-logo" src="{{ asset('assets/images/front/dar-alkurdi-mark.png') }}" alt="شعار دار الكردي" width="140" height="128" loading="lazy">
                <div class="dk-review__store-name"><strong>دار الكردي</strong><small>للإكسسوارات</small></div>
              </div>
              <div class="dk-review__card-content">
                <span class="dk-review__quote" aria-hidden="true">❞</span>
                <div class="dk-review__stars" aria-label="تقييم تجريبي {{ $review['stars'] }} من خمس نجوم">{{ str_repeat('★', $review['stars']) }}<span class="dk-review__star-dim">{{ str_repeat('★', 5-$review['stars']) }}</span></div>
                <p class="dk-review__copy">{{ $review['message'] }}</p>
                <div class="dk-review__card-top"><span class="dk-review__avatar">{{ $review['letter'] }}</span><div><strong>{{ $review['name'] }}</strong><span class="dk-review__buyer">{{ $review['kind'] }}</span></div></div>
              </div>
            </div>
          </article>
        @endforeach
      </div>
      <button class="dk-review__arrow dk-review__arrow--next" type="button" data-dkr-next aria-label="الرأي التالي"><span aria-hidden="true">❮</span></button>
    </div>
    <footer class="dk-review__footer"><div class="dk-review__dots" data-dkr-dots aria-label="التنقّل بين الآراء"></div><button type="button" class="dk-review__all-link" data-dkr-all>عرض جميع الآراء <span aria-hidden="true">←</span></button></footer>
  </div>

  {{-- تصميم النافذة فقط: معاينة غير مرتبطة بقاعدة البيانات --}}
  <div class="dk-review__modal" data-dkr-modal hidden>
    <div class="dk-review__shade" data-dkr-close></div>
    <div class="dk-review__dialog dk-review__dialog--royal dk-review__dialog--crown" role="dialog" aria-modal="true" aria-labelledby="dkReviewFormTitle" tabindex="-1">
      <svg class="dk-review__crown-frame" viewBox="0 0 1000 740" preserveAspectRatio="none" aria-hidden="true" focusable="false">
        <defs>
          <linearGradient id="dkr10Gold" x1="0" x2="1" y1="0" y2="1"><stop offset="0" stop-color="#9e672f"/><stop offset=".18" stop-color="#f5d594"/><stop offset=".40" stop-color="#b67b32"/><stop offset=".63" stop-color="#ffe7ab"/><stop offset=".82" stop-color="#c08a3e"/><stop offset="1" stop-color="#9f682b"/></linearGradient>
          <linearGradient id="dkr10Pearl" x1="0" y1="0" x2=".7" y2="1"><stop offset="0" stop-color="#fffdfa"/><stop offset=".52" stop-color="#fff8ee"/><stop offset="1" stop-color="#f5e6d3"/></linearGradient>
          <filter id="dkr10Shadow" x="-20%" y="-20%" width="140%" height="155%"><feDropShadow dx="0" dy="15" stdDeviation="16" flood-color="#2c170c" flood-opacity=".34"/></filter>
        </defs>
        <path d="M150 101 Q83 101 74 167 Q24 190 20 247 L20 580 Q20 650 88 661 Q107 717 177 717 L823 717 Q893 717 912 661 Q980 650 980 580 L980 247 Q976 190 926 167 Q917 101 850 101 L665 101 Q593 99 552 37 Q528 3 500 3 Q472 3 448 37 Q407 99 335 101 Z" fill="url(#dkr10Pearl)" stroke="url(#dkr10Gold)" stroke-width="13" stroke-linejoin="round" filter="url(#dkr10Shadow)"/>
        <path d="M156 114 Q96 114 87 178 Q38 199 34 253 L34 572 Q34 636 100 648 Q118 703 178 703 L822 703 Q882 703 900 648 Q966 636 966 572 L966 253 Q962 199 913 178 Q904 114 844 114 L664 114 Q582 112 540 47 Q521 17 500 17 Q479 17 460 47 Q418 112 336 114 Z" fill="none" stroke="#fff9e6" stroke-width="5" stroke-linejoin="round"/>
        <path d="M162 129 Q107 129 103 190 Q52 214 50 259 L50 563 Q50 620 115 635 Q129 687 183 687 L817 687 Q871 687 885 635 Q950 620 950 563 L950 259 Q948 214 897 190 Q893 129 838 129 L661 129 Q576 129 528 57 Q512 34 500 34 Q488 34 472 57 Q424 129 339 129 Z" fill="none" stroke="#d3a468" stroke-width="2.1" opacity=".85" stroke-linejoin="round"/>
      </svg>
      <button class="dk-review__dialog-close" type="button" data-dkr-close aria-label="إغلاق النافذة">×</button>
      <div class="dk-review__crown-content">
        <div class="dk-review__dialog-heading">
          <img class="dk-review__dialog-brand-logo" src="{{ asset('assets/images/front/dar-alkurdi-mark.png') }}" width="76" height="70" alt="شعار دار الكردي">
          <span class="dk-review__dialog-brand-type"><strong>دار الكردي</strong><small>للإكسسوارات</small></span>
          <span class="dk-review__dialog-divider" aria-hidden="true">✧</span>
          <h3 id="dkReviewFormTitle">اكتبي رأيك في تجربتك</h3>
          <p class="dk-review__dialog-hint">رأيك يهمنا، ونسعد بمشاركتك تجربتك معنا</p>
        </div>
        <div class="dk-review__dialog-lower">
          <form data-dkr-form class="dk-review__form dk-review__form--royal">
            <fieldset><legend>كيف تقيّمين تجربتك معنا؟</legend>
              <div class="dk-review__rating" data-dkr-rating role="radiogroup" aria-label="تقييم من نجمة إلى خمس نجوم">
                <label><input type="radio" name="demo_rating" value="1"><span aria-hidden="true">★</span><span class="visually-hidden">نجمة</span></label>
                <label><input type="radio" name="demo_rating" value="2"><span aria-hidden="true">★</span><span class="visually-hidden">نجمتان</span></label>
                <label><input type="radio" name="demo_rating" value="3"><span aria-hidden="true">★</span><span class="visually-hidden">ثلاث نجوم</span></label>
                <label><input type="radio" name="demo_rating" value="4"><span aria-hidden="true">★</span><span class="visually-hidden">أربع نجوم</span></label>
                <label><input type="radio" name="demo_rating" value="5" checked><span aria-hidden="true">★</span><span class="visually-hidden">خمس نجوم</span></label>
              </div>
            </fieldset>
            <label for="dkReviewContent">شاركينا رأيك <span aria-hidden="true">✎</span></label>
            <textarea id="dkReviewContent" rows="3" maxlength="300" required placeholder="اكتبي رأيك هنا..."></textarea>
            <button type="submit" class="dk-review__button dk-review__button--primary">معاينة رأيي <span aria-hidden="true">✧</span></button>
            <output data-dkr-feedback aria-live="polite"></output>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
