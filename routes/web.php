<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanySettingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AboutUsController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');

// Admin login routes (without middleware)
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);

// Admin routes with middleware
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Company Settings
    Route::get('/company-settings', [CompanySettingController::class, 'edit'])->name('company-settings.edit');
    Route::put('/company-settings', [CompanySettingController::class, 'update'])->name('company-settings.update');

    // Gallery Management
    Route::resource('gallery', GalleryController::class);

    // About Us Management
    Route::get('/about-us', [AboutUsController::class, 'edit'])->name('about-us.edit');
    Route::put('/about-us', [AboutUsController::class, 'update'])->name('about-us.update');
});