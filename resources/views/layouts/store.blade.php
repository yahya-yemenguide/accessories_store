<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <title>@yield('title', 'متجر الإكسسوارات')</title>

    {{-- Local assets. No CDN or Tailwind stylesheet is loaded by this layout. --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">

    <style>
        :root { --store-brown: #3b231b; --store-cream: #f8f3ea; }
        body { font-family: 'Tajawal', sans-serif; background: var(--store-cream); color: var(--store-brown); }
    </style>
    @stack('styles')
</head>
<body>
    <main id="main-content">
        @yield('content')
    </main>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
