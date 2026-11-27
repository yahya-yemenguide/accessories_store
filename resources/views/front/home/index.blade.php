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
    @include('front.home.footer')
@endsection

{{-- تنسيقات الأقسام مستقلة حتى تعمل مباشرة مع XAMPP بدون Vite --}}
@push('styles')
    @if (is_file(resource_path('css/front/featured-products.css')))
        <style data-featured-inline-css>{!! file_get_contents(resource_path('css/front/featured-products.css')) !!}</style>
    @endif
    @if (is_file(resource_path('css/front/best-sellers.css')))
        <style data-best-sellers-inline-css>{!! file_get_contents(resource_path('css/front/best-sellers.css')) !!}</style>
    @endif
    @if (is_file(resource_path('css/front/offers.css')))
        <style data-offers-inline-css>{!! file_get_contents(resource_path('css/front/offers.css')) !!}</style>
    @endif
    @if (is_file(resource_path('css/front/why-choose.css')))
        <style data-why-choose-inline-css>{!! file_get_contents(resource_path('css/front/why-choose.css')) !!}</style>
    @endif
    @if (is_file(resource_path('css/front/reviews.css')))
        <style data-reviews-inline-css>{!! file_get_contents(resource_path('css/front/reviews.css')) !!}</style>
    @endif
    @if (is_file(resource_path('css/front/footer.css')))
        <style data-ak-footer-css>{!! file_get_contents(resource_path('css/front/footer.css')) !!}</style>
    @endif
@endpush

@push('scripts')
    @if (is_file(resource_path('js/front/featured-products.js')))
        <script data-featured-inline-js>{!! file_get_contents(resource_path('js/front/featured-products.js')) !!}</script>
    @endif
    @if (is_file(resource_path('js/front/best-sellers.js')))
        <script data-best-sellers-inline-js>{!! file_get_contents(resource_path('js/front/best-sellers.js')) !!}</script>
    @endif
    @if (is_file(resource_path('js/front/offers.js')))
        <script data-offers-inline-js>{!! file_get_contents(resource_path('js/front/offers.js')) !!}</script>
    @endif
    @if (is_file(resource_path('js/front/why-choose.js')))
        <script data-why-choose-inline-js>{!! file_get_contents(resource_path('js/front/why-choose.js')) !!}</script>
    @endif
    @if (is_file(resource_path('js/front/reviews.js')))
        <script data-reviews-inline-js>{!! file_get_contents(resource_path('js/front/reviews.js')) !!}</script>
    @endif
    @if (is_file(resource_path('js/front/footer.js')))
        <script data-ak-footer-js>{!! file_get_contents(resource_path('js/front/footer.js')) !!}</script>
    @endif
@endpush
