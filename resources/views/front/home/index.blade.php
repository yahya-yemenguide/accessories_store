@extends('layouts.front')

@section('title', 'الرئيسية | دار الكردي للإكسسوارات')

@section('content')
    @include('front.home.hero')
    @include('front.home.categories')
    @include('front.home.featured-products')
@endsection

{{-- ضمان تحميل تنسيق القسم الثالث حتى لو لم تتم إضافته إلى القالب العام --}}
@push('styles')
    @if (is_file(resource_path('css/front/featured-products.css')))
        <style data-featured-inline-css>{!! file_get_contents(resource_path('css/front/featured-products.css')) !!}</style>
    @endif
@endpush

{{-- ضمان عمل المسطرة الذهبية حتى لو لم تتم إضافة JS إلى القالب العام --}}
@push('scripts')
    @if (is_file(resource_path('js/front/featured-products.js')))
        <script data-featured-inline-js>{!! file_get_contents(resource_path('js/front/featured-products.js')) !!}</script>
    @endif
@endpush
