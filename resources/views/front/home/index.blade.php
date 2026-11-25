@extends('layouts.front')

@section('title', 'الرئيسية | دار الكردي للإكسسوارات')

@section('content')
    @include('front.home.hero')
    @include('front.home.categories')
    @include('front.home.featured-products')
    @include('front.home.best-sellers')
@endsection

{{-- تحميل تنسيق المضاف حديثًا بدون أي تغيير --}}
@push('styles')
    @if (is_file(resource_path('css/front/featured-products.css')))
        <style data-featured-inline-css>{!! file_get_contents(resource_path('css/front/featured-products.css')) !!}</style>
    @endif
    @if (is_file(resource_path('css/front/best-sellers.css')))
        <style data-best-sellers-inline-css>{!! file_get_contents(resource_path('css/front/best-sellers.css')) !!}</style>
    @endif
@endpush

{{-- تحميل جافاسكريبت القسمين بشكل مستقل --}}
@push('scripts')
    @if (is_file(resource_path('js/front/featured-products.js')))
        <script data-featured-inline-js>{!! file_get_contents(resource_path('js/front/featured-products.js')) !!}</script>
    @endif
    @if (is_file(resource_path('js/front/best-sellers.js')))
        <script data-best-sellers-inline-js>{!! file_get_contents(resource_path('js/front/best-sellers.js')) !!}</script>
    @endif
@endpush
