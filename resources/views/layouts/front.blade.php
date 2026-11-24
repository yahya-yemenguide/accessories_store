<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'YourStore')</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">

    {{-- XAMPP preview: read the existing front CSS directly, without Vite/npm. --}}
    @foreach (['base.css', 'header.css', 'sidebar.css'] as $styleFile)
        <style data-front-css="{{ $styleFile }}">
            {!! file_get_contents(resource_path('css/front/' . $styleFile)) !!}
        </style>
    @endforeach

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

    @foreach (['header.js', 'sidebar.js'] as $scriptFile)
        <script data-front-js="{{ $scriptFile }}">
            {!! file_get_contents(resource_path('js/front/' . $scriptFile)) !!}
        </script>
    @endforeach

    @stack('scripts')
</body>
</html>
