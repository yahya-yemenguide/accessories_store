<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#30170f">
  <title>حسابي | دار الكردي للإكسسوارات</title>
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
  <style>{!! str_replace(['__DK_LOGIN_ART__', '__DK_REGISTER_ART__'], [asset('assets/images/front/auth/royal-login.webp'), asset('assets/images/front/auth/royal-register.webp')], file_get_contents(resource_path('css/front/auth.css'))) !!}</style>
</head>
<body class="dk-auth-page">
  <div class="dk-auth-ambient" aria-hidden="true"><span></span><span></span><span></span></div>
  <main class="dk-auth-shell" id="dkAuth" aria-label="حساب دار الكردي">
    <div class="dk-auth-form dk-auth-login" data-side="login">
      <div class="dk-auth-content">
        <section data-view="login">
          <h1>تسجيل الدخول</h1>
          <form data-demo-form="login" autocomplete="off">
            <label for="dkLoginEmail">البريد الإلكتروني</label><div class="dk-field"><i class="bi bi-envelope"></i><input id="dkLoginEmail" type="email" placeholder="name@example.com" dir="ltr" required></div>
            <label for="dkLoginPass">كلمة المرور</label><div class="dk-field"><i class="bi bi-lock"></i><input id="dkLoginPass" type="password" placeholder="كلمة المرور" required><button type="button" data-password aria-label="إظهار كلمة المرور"><i class="bi bi-eye"></i></button></div>
            <div class="dk-auth-options"><button type="button" class="dk-text-btn" data-go="forgot">نسيتِ كلمة المرور؟</button></div>
            <button class="dk-primary" type="submit">تسجيل الدخول <i class="bi bi-arrow-left"></i></button>
          </form>
          @include('front.auth.google')
          <p class="dk-auth-switchline">ليس لديكِ حساب؟ <button class="dk-text-btn" data-go="register">إنشاء حساب جديد</button></p>
        </section>
        <section data-view="forgot" hidden>
          <div class="dk-auth-symbol"><i class="bi bi-key"></i></div><h1>نسيتِ كلمة المرور؟</h1><p class="dk-auth-sub">أدخلي بريدك الإلكتروني لمعاينة خطوة استعادة الحساب.</p>
          <form data-demo-form="forgot" autocomplete="off"><label for="dkForgotEmail">البريد الإلكتروني</label><div class="dk-field"><i class="bi bi-envelope"></i><input id="dkForgotEmail" type="email" dir="ltr" placeholder="name@example.com" required></div><button class="dk-primary" type="submit">إرسال رمز الاستعادة <i class="bi bi-arrow-left"></i></button></form>
          <p class="dk-auth-switchline"><button class="dk-text-btn" data-go="login">العودة لتسجيل الدخول</button></p>
        </section>
        <section data-view="reset-verify" hidden>
          <div class="dk-auth-symbol"><i class="bi bi-shield-check"></i></div><h1>رمز الاستعادة</h1><p class="dk-auth-sub">معاينة إدخال رمز من ستة أرقام. الرمز التجريبي 123456؛ لم يُرسل بريد.</p>
          @include('front.auth.otp', ['kind'=>'reset'])
          <p class="dk-auth-switchline"><button class="dk-text-btn" data-go="forgot">تعديل البريد الإلكتروني</button></p>
        </section>
        <section data-view="reset" hidden>
          <div class="dk-auth-symbol"><i class="bi bi-lock-fill"></i></div><h1>كلمة مرور جديدة</h1><p class="dk-auth-sub">اختاري كلمة مرور قوية لحسابكِ.</p>
          <form data-demo-form="reset" autocomplete="off"><label for="dkNewPass">كلمة المرور الجديدة</label><div class="dk-field"><i class="bi bi-lock"></i><input id="dkNewPass" type="password" minlength="8" data-strength required><button type="button" data-password aria-label="إظهار كلمة المرور"><i class="bi bi-eye"></i></button></div>@include('front.auth.strength')<button class="dk-primary" type="submit">حفظ كلمة المرور</button></form>
        </section>
        <section data-view="success" hidden><div class="dk-auth-symbol dk-success"><i class="bi bi-check2"></i></div><h1>اكتملت المعاينة</h1><p class="dk-auth-sub" id="dkSuccessText">هذه تجربة للواجهة فقط؛ لم يتم تغيير أي حساب.</p><button class="dk-primary" data-go="login">العودة لتسجيل الدخول</button></section>
        <a class="dk-auth-home" href="{{ url('/') }}"><i class="bi bi-house-door"></i> العودة إلى المتجر</a>
        <p class="dk-auth-demo" role="status" id="dkAuthStatus" hidden></p>
      </div>
    </div>
    <div class="dk-auth-form dk-auth-register" data-side="register" inert aria-hidden="true">
      <div class="dk-auth-content">
        <section data-view="register" hidden>
          <h1>إنشاء حساب جديد</h1>
          <form data-demo-form="register" autocomplete="off">
            <label for="dkName">الاسم</label><div class="dk-field"><i class="bi bi-person"></i><input id="dkName" placeholder="اسمكِ" required></div>
            <label for="dkRegEmail">البريد الإلكتروني</label><div class="dk-field"><i class="bi bi-envelope"></i><input id="dkRegEmail" type="email" dir="ltr" placeholder="name@example.com" required></div>
            <label for="dkRegPass">كلمة المرور</label><div class="dk-field"><i class="bi bi-lock"></i><input id="dkRegPass" type="password" minlength="8" data-strength required placeholder="8 أحرف على الأقل"><button type="button" data-password aria-label="إظهار كلمة المرور"><i class="bi bi-eye"></i></button></div>
            @include('front.auth.strength')
            <button class="dk-primary" type="submit">إنشاء حساب <i class="bi bi-arrow-left"></i></button>
          </form>
          @include('front.auth.google')
          <p class="dk-auth-switchline">لديكِ حساب؟ <button class="dk-text-btn" data-go="login">تسجيل الدخول</button></p>
        </section>
        <section data-view="verify" hidden><div class="dk-auth-symbol"><i class="bi bi-envelope-check"></i></div><h1>تحققي من بريدكِ</h1><p class="dk-auth-sub">معاينة رمز التحقق المكون من ستة أرقام. الرمز التجريبي 123456؛ لم يُرسل بريد.</p>@include('front.auth.otp', ['kind'=>'register'])<p class="dk-auth-switchline"><button class="dk-text-btn" data-go="register">تعديل البريد الإلكتروني</button></p></section>
        <a class="dk-auth-home" href="{{ url('/') }}"><i class="bi bi-house-door"></i> العودة إلى المتجر</a>
      </div>
    </div>
    <div class="dk-auth-curtain" aria-hidden="true"><div class="dk-auth-engraving"></div><div class="dk-auth-orbit"></div><svg class="dk-native-arch" viewBox="0 0 400 2400" preserveAspectRatio="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="dkNativeBrown" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#35170c"/><stop offset=".5" stop-color="#6d3d20"/><stop offset="1" stop-color="#291109"/></linearGradient><linearGradient id="dkNativeGold" x1="0%" y1="0%" x2="100%" y2="0%"><stop stop-color="#92501d"/><stop offset=".25" stop-color="#ffe7a2"/><stop offset=".5" stop-color="#b87932"/><stop offset=".75" stop-color="#fff1c3"/><stop offset="1" stop-color="#92501d"/></linearGradient></defs><path d="M 8 62 Q 8 46 26 43 C 115 28 154 36 178 24 Q 190 19 200 5 Q 210 19 222 24 C 246 36 285 28 374 43 Q 392 46 392 62 L 392 2338 Q 392 2354 374 2357 C 285 2372 246 2364 222 2376 Q 210 2381 200 2395 Q 190 2381 178 2376 C 154 2364 115 2372 26 2357 Q 8 2354 8 2338 Z" fill="url(#dkNativeBrown)" stroke="#75431f" stroke-width="8" vector-effect="non-scaling-stroke"/><path d="M 8 62 Q 8 46 26 43 C 115 28 154 36 178 24 Q 190 19 200 5 Q 210 19 222 24 C 246 36 285 28 374 43 Q 392 46 392 62 L 392 2338 Q 392 2354 374 2357 C 285 2372 246 2364 222 2376 Q 210 2381 200 2395 Q 190 2381 178 2376 C 154 2364 115 2372 26 2357 Q 8 2354 8 2338 Z" fill="none" stroke="url(#dkNativeGold)" stroke-width="5" vector-effect="non-scaling-stroke"/><path d="M 8 62 Q 8 46 26 43 C 115 28 154 36 178 24 Q 190 19 200 5 Q 210 19 222 24 C 246 36 285 28 374 43 Q 392 46 392 62 L 392 2338 Q 392 2354 374 2357 C 285 2372 246 2364 222 2376 Q 210 2381 200 2395 Q 190 2381 178 2376 C 154 2364 115 2372 26 2357 Q 8 2354 8 2338 Z" fill="none" stroke="#fff3ce" stroke-width="1" vector-effect="non-scaling-stroke"/><path d="M200 1 L209 13 L200 25 L191 13 Z M200 2375 L209 2387 L200 2399 L191 2387 Z" fill="url(#dkNativeGold)" stroke="#fff1c9" stroke-width="1.2" vector-effect="non-scaling-stroke"/></svg></div>
    <div class="dk-auth-panel dk-panel-left" data-panel="login">
      <div class="dk-panel-brand"><img src="{{ asset('assets/images/front/dar-alkurdi-mark.png') }}" alt="" width="90" height="82"><span class="dk-panel-name">دار الكردي</span><small>للإكسسوارات</small></div>
      <div class="dk-jewel-stage" aria-hidden="true"><div class="dk-jewel-ring"></div><img src="{{ asset('assets/images/front/products/featured-2.webp') }}" alt=""><span class="dk-jewel-spark">✦</span></div>
      <h2>أهلًا بعودتكِ</h2><p>تألقي من جديد مع دار الكردي.</p>
    </div>
    <div class="dk-auth-panel dk-panel-right" data-panel="register" inert aria-hidden="true">
      <div class="dk-panel-brand"><img src="{{ asset('assets/images/front/dar-alkurdi-mark.png') }}" alt="" width="90" height="82"><span class="dk-panel-name">دار الكردي</span><small>للإكسسوارات</small></div>
      <div class="dk-jewel-stage" aria-hidden="true"><div class="dk-jewel-ring"></div><img src="{{ asset('assets/images/front/products/featured-3.webp') }}" alt=""><span class="dk-jewel-spark">✦</span></div>
      <h2>أهلًا بكِ في عالمنا</h2><p>ابدئي حكاية أناقتكِ مع دار الكردي.</p>
    </div>
  </main>
  <script>{!! file_get_contents(resource_path('js/front/auth.js')) !!}</script>
</body>
</html>
