<div class="announcement-bar" aria-label="أخبار وعروض المتجر">
  <div class="announcement-window" aria-live="off">
    <div class="announcement-marquee" id="announcementMarquee">
      @for ($repeat = 0; $repeat < 2; $repeat++)
        <div class="announcement-sequence" @if ($repeat === 1) aria-hidden="true" @endif>
          <span class="announcement-item"><i class="bi bi-gift" aria-hidden="true"></i> اكتشفي تشكيلتنا الجديدة بخصومات مميزة</span>
          <span class="announcement-sparkle" aria-hidden="true">✦</span>
          <span class="announcement-item"><i class="bi bi-truck" aria-hidden="true"></i> شحن سريع لجميع المناطق</span>
          <span class="announcement-sparkle" aria-hidden="true">✦</span>
          <span class="announcement-item"><i class="bi bi-shield-check" aria-hidden="true"></i> تسوق آمن وموثوق</span>
          <span class="announcement-sparkle" aria-hidden="true">✦</span>
          <span class="announcement-item"><i class="bi bi-gift-fill" aria-hidden="true"></i> تغليف أنيق وهدايا مميزة</span>
          <span class="announcement-sparkle" aria-hidden="true">✦</span>
        </div>
      @endfor
    </div>
  </div>
</div>
