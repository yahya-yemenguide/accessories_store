{{-- دار الكردي | منتجات العرض الحالية؛ تُربط بيانات المبيعات لاحقاً. --}}
@php
    $royalBestSellers = [
        ['name'=>'ساعة ذهبية أنيقة','price'=>'٣٢٬٠٠٠','image'=>'featured-3.webp','kind'=>'الساعات'],
        ['name'=>'عقد زهرة اللؤلؤ','price'=>'١٥٬٠٠٠','image'=>'featured-2.webp','kind'=>'الفضيات'],
        ['name'=>'سوار الوردة الذهبية','price'=>'١٨٬٥٠٠','image'=>'featured-4.webp','kind'=>'المطليات'],
        ['name'=>'خاتم حجر لامع','price'=>'٢٢٬٠٠٠','image'=>'featured-6.webp','kind'=>'الخواتم'],
        ['name'=>'أقراط زركون براقة','price'=>'١٤٬٠٠٠','image'=>'featured-5.webp','kind'=>'الزركونات'],
        ['name'=>'قلادة قطرة الزركون','price'=>'١٦٬٥٠٠','image'=>'featured-7.webp','kind'=>'الزركونات'],
        ['name'=>'أقراط فيونكة كريستال','price'=>'١٢٬٥٠٠','image'=>'featured-1.webp','kind'=>'المطليات'],
    ];
@endphp
<section class="ak-best" id="akBestSellers" aria-labelledby="akBestTitle" dir="rtl">
    <div class="ak-best__halo" aria-hidden="true"></div>
    <div class="ak-best__filigree ak-best__filigree--right" aria-hidden="true">✦</div>
    <div class="ak-best__filigree ak-best__filigree--left" aria-hidden="true">✦</div>
    <div class="ak-best__header">
        <div class="ak-best__signature" aria-hidden="true"><span>✧</span><i></i><span>✧</span></div>
        <div class="ak-best__heading">
            <span class="ak-best__eyebrow">DAR AL-KURDI  ·  SIGNATURE COLLECTION</span>
            <h2 id="akBestTitle"><i class="bi bi-gem" aria-hidden="true"></i> الأكثر مبيعًا <i class="bi bi-gem" aria-hidden="true"></i></h2>
            <p>اختيارات تتألق بحضورها وتفاصيلها</p>
        </div>
        <div class="ak-best__seal" aria-hidden="true"><span>✦</span><small>TAK</small></div>
    </div>
    <div class="ak-best__divider" aria-hidden="true"><span>✦</span></div>

    <div class="ak-best__viewport" id="akBestViewport" tabindex="0" role="region" aria-label="المنتجات المميزة، اسحب أفقيًا لرؤية المزيد">
        <div class="ak-best__track">
            @foreach ($royalBestSellers as $i => $product)
                <article class="ak-best__card {{ $i < 3 ? 'ak-best__card--royal' : '' }}" style="--ak-order: {{ $i }};" aria-label="{{ $product['name'] }}">
                    <div class="ak-best__photo">
                        <img src="{{ asset('assets/images/front/products/' . $product['image']) }}" alt="{{ $product['name'] }}" loading="lazy" width="560" height="730">
                        <span class="ak-best__number" aria-label="الترتيب {{ $i + 1 }}">{{ str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="ak-best__glint" aria-hidden="true">✦</span>
                    </div>
                    <div class="ak-best__details">
                        <span class="ak-best__category">{{ $product['kind'] }}</span>
                        <h3>{{ $product['name'] }}</h3>
                        <div class="ak-best__price"><span>{{ $product['price'] }}</span> <small>ر.ي</small></div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>

    <div class="ak-best__navigation" aria-label="مؤشر استكشاف المنتجات">
        <span class="ak-best__caption">تصفّح المجموعة</span>
        <div class="ak-best__meter" id="akBestMeter" role="slider" tabindex="0" aria-label="تمرير المنتجات أفقيًا" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <span class="ak-best__meter-rail"><span class="ak-best__meter-fill"></span><span class="ak-best__meter-jewel">◆</span></span>
        </div>
        <span class="ak-best__count" id="akBestCount" aria-live="off"><b>01</b> / 07</span>
    </div>
    
</section>
