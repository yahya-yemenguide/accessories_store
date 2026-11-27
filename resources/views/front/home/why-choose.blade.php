{{-- دار الكردي | لماذا تختاريننا - أربع مزايا واقعية، دون صور خلفية أو ادعاءات تغليف. --}}
@php
    $whyFeatures = [
      ['type'=>'jewel','title'=>'تصاميم تأسر الأنظار','desc'=>'تشكيلة أنيقة تضيف لمسة جمال لكل إطلالة.'],
      ['type'=>'collection','title'=>'تشكيلة لكل الأذواق','desc'=>'خيارات متنوعة تناسب أسلوبك ومناسباتك.'],
      ['type'=>'offer','title'=>'عروض مميزة','desc'=>'فرص وتخفيضات على قطع مختارة عند توفر العروض.'],
      ['type'=>'delivery','title'=>'توصيل لحد بابك','desc'=>'تسوّقي إكسسواراتك بسهولة مع خدمة التوصيل المتاحة.'],
    ];
@endphp
<section class="dkw-royal" id="darWhyChoose" dir="rtl" aria-labelledby="darWhyTitle">
  <div class="dkw-royal__inner">
    <header class="dkw-royal__heading">
      <span class="dkw-royal__crown" aria-hidden="true">♛</span>
      <div class="dkw-royal__titleframe"><h2 id="darWhyTitle">لماذا تختارين دار الكردي؟</h2></div>
      <p>تفاصيل أنيقة، خيارات متنوعة، وتجربة تسوّق تليق بذوقك.</p>
    </header>
    <div class="dkw-royal__grid">
      @foreach ($whyFeatures as $feature)
      <article class="dkw-royal__card" data-feature="{{ $feature['type'] }}">
        <div class="dkw-royal__engrave" aria-hidden="true"></div>
        <span class="dkw-royal__spark dkw-royal__spark--a" aria-hidden="true">✦</span>
        <span class="dkw-royal__spark dkw-royal__spark--b" aria-hidden="true">✧</span>
        <div class="dkw-royal__finial" aria-hidden="true"><span>◆</span></div>
        <div class="dkw-royal__stage" aria-hidden="true">
          <div class="dkw-royal__art">
          @switch($feature['type'])
            @case('jewel')
              <svg viewBox="0 0 200 155" role="presentation" focusable="false"><defs><linearGradient id="dkw-gem-g" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#fffce9"/><stop offset=".3" stop-color="#f3d390"/><stop offset=".7" stop-color="#b47835"/><stop offset="1" stop-color="#fff0be"/></linearGradient></defs><path d="M54 15 Q99 81 146 15" fill="none" stroke="url(#dkw-gem-g)" stroke-width="6" stroke-linecap="round"/><g fill="#fff5d4" stroke="#b97d39" stroke-width="2"><circle cx="60" cy="25" r="7"/><circle cx="77" cy="40" r="7"/><circle cx="123" cy="40" r="7"/><circle cx="140" cy="25" r="7"/></g><path d="M86 60L114 60L132 82L100 122L68 82Z" fill="url(#dkw-gem-g)" stroke="#fff3cd" stroke-width="3"/><path d="M68 82H132M86 60L100 122L114 60M68 82L114 60M132 82L86 60" stroke="#fffcee" stroke-width="2" fill="none"/><path d="M100 69V93 M87 81H113" stroke="#fff" stroke-width="3" opacity=".85"/></svg>
              @break
            @case('collection')
              <svg viewBox="0 0 200 155" role="presentation" focusable="false"><defs><linearGradient id="dkw-neck-g" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#fff8da"/><stop offset=".5" stop-color="#dca350"/><stop offset="1" stop-color="#91541f"/></linearGradient></defs><path d="M55 35Q100 100 145 35" fill="none" stroke="url(#dkw-neck-g)" stroke-width="5"/><g fill="#fff6e0" stroke="#c59043" stroke-width="2"><circle cx="62" cy="44" r="7"/><circle cx="76" cy="63" r="7"/><circle cx="123" cy="63" r="7"/><circle cx="138" cy="44" r="7"/></g><path d="M89 80L111 80L121 97L100 125L79 97Z" fill="#fff8e4" stroke="#c48c42" stroke-width="4"/><path d="M79 97H121L100 125Z" fill="#e7b86d"/><g transform="translate(145 91) rotate(22)"><path d="M0 -24L17 0L0 24L-17 0Z" fill="#fffae9" stroke="#ac7432" stroke-width="4"/><path d="M-17 0H17M0 -24V24" stroke="#d7b477" stroke-width="2"/></g><g transform="translate(52 91) rotate(-18)"><path d="M0 -19L14 0L0 19L-14 0Z" fill="#fffae9" stroke="#ac7432" stroke-width="3"/></g></svg>
              @break
            @case('offer')
              <svg viewBox="0 0 200 155" role="presentation" focusable="false"><defs><linearGradient id="dkw-tag-g" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#fff9df"/><stop offset=".45" stop-color="#e7b86c"/><stop offset="1" stop-color="#aa6c30"/></linearGradient></defs><g transform="translate(100 80) rotate(-11)"><path d="M-57 -34 H21L57 0L21 34H-57Q-65 34 -65 26V-26Q-65 -34 -57 -34Z" fill="url(#dkw-tag-g)" stroke="#fff2bf" stroke-width="4"/><path d="M-55 -26 H16L44 0L16 26H-55Z" fill="none" stroke="#aa662c" stroke-width="2" opacity=".6"/><circle cx="20" cy="0" r="7" fill="#fff7df" stroke="#a56c38" stroke-width="2"/><path d="M-37 17L-2 -18" stroke="#6d3618" stroke-width="7" stroke-linecap="round"/><circle cx="-36" cy="-12" r="9" fill="none" stroke="#6d3618" stroke-width="5"/><circle cx="-5" cy="15" r="9" fill="none" stroke="#6d3618" stroke-width="5"/></g><path d="M160 31l6 12 12 6-12 6-6 12-6-12-12-6 12-6Z" fill="#ffefa6"/></svg>
              @break
            @case('delivery')
              <svg viewBox="0 0 200 155" role="presentation" focusable="false"><defs><linearGradient id="dkw-truck-g" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#fff0ba"/><stop offset=".5" stop-color="#d6a050"/><stop offset="1" stop-color="#835021"/></linearGradient></defs><rect x="23" y="53" width="101" height="57" rx="9" fill="url(#dkw-truck-g)" stroke="#fff3cd" stroke-width="3"/><rect x="30" y="61" width="87" height="40" rx="5" fill="#663019" stroke="#dba857" stroke-width="2"/><text x="74" y="88" text-anchor="middle" font-size="25" font-family="Georgia,serif" font-weight="bold" fill="#f8d597">DK</text><path d="M124 71H150L177 93V110H124Z" fill="url(#dkw-truck-g)" stroke="#fff3cd" stroke-width="3"/><path d="M136 78H147L161 91H136Z" fill="#e8f6f5" stroke="#c18b44" stroke-width="2"/><circle cx="56" cy="111" r="14" fill="#572d18" stroke="#f1c776" stroke-width="5"/><circle cx="148" cy="111" r="14" fill="#572d18" stroke="#f1c776" stroke-width="5"/><circle cx="56" cy="111" r="5" fill="#fff5da"/><circle cx="148" cy="111" r="5" fill="#fff5da"/><path d="M10 73h13M4 87h19M13 101h10" stroke="#d5a65a" stroke-width="4" stroke-linecap="round"/></svg>
              @break
          @endswitch
          </div>
          <div class="dkw-royal__pedestal"><span></span></div>
        </div>
        <div class="dkw-royal__copy"><h3>{{ $feature['title'] }}</h3><div class="dkw-royal__rule" aria-hidden="true"><span>◆</span></div><p>{{ $feature['desc'] }}</p></div>
        <div class="dkw-royal__foot" aria-hidden="true">✧</div>
      </article>
      @endforeach
    </div>
    <div class="dkw-royal__signature" aria-hidden="true"><span></span>◆<span></span></div>
  </div>
</section>
