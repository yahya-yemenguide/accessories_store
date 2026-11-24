<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'YourStore')</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">

    @vite([
        'resources/css/front/base.css',
        'resources/css/front/header.css',
        'resources/css/front/sidebar.css',
        'resources/js/front/header.js',
        'resources/js/front/sidebar.js',
    ])

    @stack('styles')
</head>
<body class="front-body">
    @include('front.components.sidebar')

    <div class="front-page-shell" id="frontPageShell">
        @include('front.components.announcement-bar')
        @include('front.components.header')

        <main class="front-main">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
