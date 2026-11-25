{{-- عرض تجريبي؛ استبدل المصفوفة لاحقًا بمنتجات قاعدة البيانات --}}
@php
    $featured = [
        ['name' => 'أقراط فيونكة كريستال', 'price' => '١٢٬٥٠٠', 'image' => 'featured-1.webp', 'tag' => 'وصل حديثًا'],
        ['name' => 'عقد زهرة اللؤلؤ', 'price' => '١٥٬٠٠٠', 'image' => 'featured-2.webp', 'tag' => 'وصل حديثًا'],
        ['name' => 'ساعة ذهبية أنيقة', 'price' => '٣٢٬٠٠٠', 'image' => 'featured-3.webp', 'tag' => 'وصل حديثًا'],
        ['name' => 'سوار الوردة الذهبية', 'price' => '١٨٬٥٠٠', 'image' => 'featured-4.webp', 'tag' => 'وصل حديثًا'],
        ['name' => 'أقراط زركون براقة', 'price' => '١٤٬٠٠٠', 'image' => 'featured-5.webp', 'tag' => 'وصل حديثًا'],
        ['name' => 'خاتم حجر لامع', 'price' => '٢٢٬٠٠٠', 'image' => 'featured-6.webp', 'tag' => 'وصل حديثًا'],
        ['name' => 'قلادة قطرة الزركون', 'price' => '١٦٬٥٠٠', 'image' => 'featured-7.webp', 'tag' => 'وصل حديثًا'],
    ];
@endphp
<section class="dk-products" id="featuredProducts" aria-labelledby="dkProductsTitle" dir="rtl">
  <div class="dk-products__head">
    <div class="dk-products__ornament" aria-hidden="true">✦ <span></span> ✦</div>
    <div class="dk-products__title-group">
      <div class="dk-products__eyebrow">جديد دار الكردي</div>
      <h2 id="dkProductsTitle"><i class="bi bi-stars" aria-hidden="true"></i> المضاف حديثًا</h2>
    </div>
    <a class="dk-products__all" href="#" aria-label="عرض كل المنتجات، قريبًا">عرض الكل <i class="bi bi-arrow-left" aria-hidden="true"></i></a>
  </div>
  <p class="dk-products__sub">أحدث إكسسواراتنا المختارة لكِ</p>
  <div class="dk-products__viewport" id="dkProductsViewport" tabindex="0" role="region" aria-label="تصفّح المنتجات بالسحب يمينًا ويسارًا">
    <div class="dk-products__track">
      @foreach($featured as $index => $product)
      <article class="dk-product">
        <div class="dk-product__media">
          <img src="{{ asset('assets/images/front/products/' . $product['image']) }}" alt="{{ $product['name'] }}" loading="lazy" width="560" height="730">
          <span class="dk-product__tag">{{ $product['tag'] }}</span>
          <button class="dk-product__heart" type="button" aria-label="إضافة {{ $product['name'] }} إلى المفضلة — للمعاينة" aria-pressed="false"><i class="bi bi-heart" aria-hidden="true"></i></button>
        </div>
        <div class="dk-product__info">
          <h3>{{ $product['name'] }}</h3>
          <div class="dk-product__bottom">
            <span class="dk-product__price" dir="rtl">{{ $product['price'] }} <small>ر.ي</small></span>
            <button class="dk-product__cart" type="button" aria-label="إضافة {{ $product['name'] }} إلى السلة — للمعاينة" title="معاينة فقط"><i class="bi bi-bag-plus" aria-hidden="true"></i></button>
          </div>
        </div>
      </article>
      @endforeach
    </div>
  </div>
  <div class="dk-products__ruler" id="dkProductsRuler" role="slider" tabindex="0" aria-label="مسطرة التنقل بين المنتجات" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
    <div class="dk-products__ruler-line"><div class="dk-products__ruler-fill"></div><div class="dk-products__ruler-thumb"><span>✦</span></div></div>
    <span class="dk-products__hint">اسحبي لاستكشاف المزيد</span>
  </div>
</section>
