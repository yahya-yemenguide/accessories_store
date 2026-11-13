<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#361b0d">
    <title>@yield('title', 'Your Store')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link rel="stylesheet" href="{{ asset('css/front/store.css') }}">
    @stack('styles')
</head>
<body class="ys-page">
    @include('front.topbar')
    @include('front.header')
    @include('front.mobile-menu')

    <main id="main-content" class="ys-main">
        @yield('content')
    </main>

    @include('front.footer')

    <script src="{{ asset('js/front/store-ui.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
