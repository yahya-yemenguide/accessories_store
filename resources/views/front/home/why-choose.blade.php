{{-- دار الكردي | أربع مميزات حقيقية؛ دون أرقام أو ملصقات أو صور خلفية. --}}
@php
  $darBenefits = [
    ['icon'=>'bi-gem', 'title'=>'تصاميم تأسر الأنظار', 'description'=>'تشكيلة أنيقة تضيف لمسة جمال لكل إطلالة.'],
    ['icon'=>'bi-stars', 'title'=>'تشكيلة لكل الأذواق', 'description'=>'خيارات متنوعة تناسب أسلوبك ومناسباتك.'],
    ['icon'=>'bi-tags', 'title'=>'عروض مميزة', 'description'=>'فرص وتخفيضات على قطع مختارة عند توفر العروض.'],
    ['icon'=>'bi-truck', 'title'=>'توصيل لحد بابك', 'description'=>'تسوّقي إكسسواراتك بسهولة مع خدمة التوصيل المتاحة.'],
  ];
@endphp
<section class="dar-why" id="darWhyChoose" aria-labelledby="darWhyTitle" dir="rtl">
  <div class="dar-why__container">
    <header class="dar-why__header">
      <span class="dar-why__eyebrow">✦ تميّز دار الكردي ✦</span>
      <h2 id="darWhyTitle">لماذا تختارين <span>دار الكردي؟</span></h2>
      <p>تفاصيل أنيقة، اختيارات مميزة، وتجربة تسوق تليق بذوقك.</p>
      <div class="dar-why__signature" aria-hidden="true"><i></i><span>✧</span><i></i></div>
    </header>
    <div class="dar-why__grid">
      @foreach($darBenefits as $benefit)
        <article class="dar-why__card">
          <div class="dar-why__card-light" aria-hidden="true"></div>
          <div class="dar-why__emblem" aria-hidden="true">
            <span class="dar-why__emblem-shine"></span>
            <i class="bi {{ $benefit['icon'] }}"></i>
          </div>
          <div class="dar-why__card-copy">
            <h3>{{ $benefit['title'] }}</h3>
            <span class="dar-why__fine-rule" aria-hidden="true"></span>
            <p>{{ $benefit['description'] }}</p>
          </div>
          <span class="dar-why__card-diamond" aria-hidden="true">✦</span>
        </article>
      @endforeach
    </div>
    <div class="dar-why__footer" aria-hidden="true"><i></i><span>✦</span><i></i></div>
  </div>
</section>
