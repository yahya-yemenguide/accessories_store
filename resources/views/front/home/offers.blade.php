{{-- Silk Boutique / Dar Al-Kurdi. Four example offers; prices must be approved before selling. --}}
@php
  $silkOffers = [
    ['name'=>'خاتم حجر لامع','kind'=>'الخواتم','image'=>'featured-6.webp','old'=>28000,'new'=>19600,'discount'=>30,'description'=>'تصميم عصري وأنيق'],
    ['name'=>'أقراط زركون براقة','kind'=>'الزركونات','image'=>'featured-5.webp','old'=>16000,'new'=>12000,'discount'=>25,'description'=>'تضيف لمسة من الفخامة'],
    ['name'=>'عقد زهرة اللؤلؤ','kind'=>'الفضيات','image'=>'featured-2.webp','old'=>15000,'new'=>12000,'discount'=>20,'description'=>'بريق رقيق لكل إطلالة'],
    ['name'=>'ساعة ذهبية أنيقة','kind'=>'الساعات','image'=>'featured-3.webp','old'=>32000,'new'=>25600,'discount'=>20,'description'=>'تفاصيل ذهبية راقية'],
  ];
@endphp
<section class="silk-offers" id="akOffers" dir="rtl" aria-labelledby="silkOffersTitle"
  style="--silk-stage:url('{{ asset('assets/images/front/offers/silk-boutique-stage.webp') }}'); --silk-mobile-stage:url('{{ asset('assets/images/front/offers/silk-boutique-mobile-v6.webp') }}')">
  <div class="silk-offers__inner">
    <header class="silk-offers__heading">
      <span class="silk-offers__bow" aria-hidden="true">✧</span>
      <div class="silk-offers__title-frame"><h2 id="silkOffersTitle">العروض والخصومات</h2></div>
      <p class="silk-offers__tagline">عروض حصرية لفترة محدودة <i class="bi bi-clock" aria-hidden="true"></i></p>
    </header>
    <div class="silk-offers__viewport" id="silkOffersViewport" tabindex="0" role="region" aria-label="أربعة عروض، اسحب أفقيًا لاستكشافها">
      <div class="silk-offers__track">
        @foreach($silkOffers as $offer)
          <article class="silk-offers__card" aria-label="{{ $offer['name'] }} - خصم {{ $offer['discount'] }} بالمئة">
            <div class="silk-offers__photo">
              <div class="silk-offers__photo-sheen" aria-hidden="true"></div>
              <img src="{{ asset('assets/images/front/products/' . $offer['image']) }}" alt="{{ $offer['name'] }}" loading="lazy" width="560" height="730">
              <div class="silk-offers__seal" aria-label="خصم {{ $offer['discount'] }} بالمئة"><small>خصم</small><strong>{{ $offer['discount'] }}%</strong></div>
            </div>
            <div class="silk-offers__content">
              <span class="silk-offers__diamond" aria-hidden="true">◇</span>
              <h3>{{ $offer['name'] }}</h3>
              <p class="silk-offers__description">{{ $offer['description'] }}</p>
              <div class="silk-offers__rule" aria-hidden="true"></div>
              <del class="silk-offers__old">{{ number_format($offer['old']) }} ر.ي</del>
              <div class="silk-offers__price">{{ number_format($offer['new']) }} <small>ر.ي</small></div>
              <button type="button" class="silk-offers__cta" data-silk-detail data-name="{{ $offer['name'] }}" data-price="{{ number_format($offer['new']) }}" data-off="{{ $offer['discount'] }}">تفاصيل العرض <i class="bi bi-arrow-left" aria-hidden="true"></i></button>
            </div>
          </article>
        @endforeach
      </div>
    </div>
    <div class="silk-offers__navigator" aria-label="التنقل بين العروض">
      <div class="silk-offers__meter" id="silkOffersMeter" role="slider" tabindex="0" aria-label="مسطرة العروض" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
        <div class="silk-offers__meter-fill"></div><span class="silk-offers__meter-gem">✦</span>
      </div>
      <div class="silk-offers__dots" aria-hidden="true"><i class="is-active"></i><i></i><i></i><i></i></div>
    </div>
  </div>
  <dialog class="silk-offers__dialog" id="silkOffersDialog" aria-labelledby="silkOffersDialogTitle">
    <form method="dialog"><button type="submit" class="silk-offers__close" aria-label="إغلاق">×</button></form>
    <span class="silk-offers__dialog-gem" aria-hidden="true">✦</span>
    <h3 id="silkOffersDialogTitle"></h3>
    <p id="silkOffersDialogDescription"></p>
  </dialog>
</section>
