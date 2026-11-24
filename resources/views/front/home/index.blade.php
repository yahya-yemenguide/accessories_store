@extends('layouts.front')

@section('title', 'الرئيسية | YourStore')

@section('content')
    <section class="hero-preview-wrap">
        <div class="hero-preview-card">
            <div class="hero-preview-top">
                <span class="hero-pill">المعاينة التالية</span>
                <span class="hero-pill light">البانر الرئيسي</span>
            </div>

            <div class="hero-preview-content">
                <div class="hero-copy">
                    <h1>واجهة راقية<br> لهيدر فاخر ومنسق</h1>
                    <p>تم تجهيز الهيدر، القائمة الجانبية، وشريط البحث وفق الهوية البصرية التي اخترتها. الخطوة التالية ستكون تنفيذ البانر الرئيسي بنفس الفخامة.</p>
                    <button type="button" class="hero-action">عرض التفاصيل</button>
                </div>

                <div class="hero-ornaments">
                    <div class="mini-card one">
                        <i class="bi bi-bag-heart"></i>
                    </div>
                    <div class="mini-card two">
                        <i class="bi bi-gem"></i>
                    </div>
                    <div class="mini-card three">
                        <i class="bi bi-stars"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
