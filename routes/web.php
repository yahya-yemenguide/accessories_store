<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index']);
// واجهة عرض فقط: لا توجد مصادقة أو معالجة بيانات في هذه المرحلة.
Route::view('/customer/account', 'front.auth.index')->name('front.account');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
