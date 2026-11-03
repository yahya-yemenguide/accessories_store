<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;

// ==========================================
// 1. مسارات الزبائن (Front-end)
// ==========================================
Route::get('/', [HomeController::class, 'index']);

// ==========================================
// 2. مسارات لوحة التحكم (Admin Panel)
// ==========================================
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // مسارات الإدارة الأخرى (إضافة منتج، تعديل، إلخ) ستكون هنا لاحقاً
});
