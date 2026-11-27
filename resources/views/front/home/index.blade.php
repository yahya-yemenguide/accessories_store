@extends('layouts.front')

@section('title', 'الرئيسية | دار الكردي للإكسسوارات')

@section('content')
    @include('front.home.hero')
    @include('front.home.categories')
    @include('front.home.featured-products')
    @include('front.home.best-sellers')
    @include('front.home.offers')
    @include('front.home.why-choose')
    @include('front.home.reviews')
    @include('front.home.contact')
    @include('front.home.footer')
@endsection

{{-- تنسيقات الأقسام مستقلة حتى تعمل مباشرة مع XAMPP بدون Vite --}}
@push('styles')
    @foreach (['featured-products.css','best-sellers.css','offers.css','why-choose.css','reviews.css','contact.css','footer.css'] as $styleFile)
        @if (is_file(resource_path('css/front/' . $styleFile)))
            <style data-front-home-css="{{ $styleFile }}">{!! file_get_contents(resource_path('css/front/' . $styleFile)) !!}</style>
        @endif
    @endforeach
@endpush

@push('scripts')
    @foreach (['featured-products.js','best-sellers.js','offers.js','why-choose.js','reviews.js','contact.js','footer.js'] as $scriptFile)
        @if (is_file(resource_path('js/front/' . $scriptFile)))
            <script data-front-home-js="{{ $scriptFile }}">{!! file_get_contents(resource_path('js/front/' . $scriptFile)) !!}</script>
        @endif
    @endforeach
@endpush
