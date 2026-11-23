@extends('layouts.store')

@section('title', 'اختبار تجهيز واجهة المتجر')

@section('content')
<section class="container py-5" aria-labelledby="setup-title">
    <div class="mx-auto p-4 p-md-5 bg-white rounded-4 shadow-sm" style="max-width: 720px;">
        <div class="d-flex align-items-center gap-3 mb-3">
            <i class="bi bi-gem fs-1" aria-hidden="true"></i>
            <div>
                <h1 id="setup-title" class="h3 mb-1 fw-bold">واجهة المتجر جاهزة للتصميم</h1>
                <p class="text-secondary mb-0">صفحة مؤقتة لاختبار ربط Laravel والمكتبات المحلية</p>
            </div>
        </div>

        <p class="mb-4">إذا ظهر خط <strong>Tajawal</strong> والأيقونة أعلاه، فملفات الخط والأيقونات تُحمَّل على الأغلب بشكل صحيح. جرّب الزر التالي لاختبار JavaScript الخاص بـ Bootstrap.</p>

        <button class="btn btn-dark px-4" type="button" data-bs-toggle="modal" data-bs-target="#localAssetsTest">
            <i class="bi bi-check-circle ms-2" aria-hidden="true"></i>اختبار نافذة Bootstrap
        </button>
    </div>
</section>

<div class="modal fade" id="localAssetsTest" tabindex="-1" aria-labelledby="localAssetsTestLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="localAssetsTestLabel">اختبار التفاعل المحلي</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">إذا فتحت هذه النافذة، فإن ملف Bootstrap Bundle يعمل.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
@endsection
