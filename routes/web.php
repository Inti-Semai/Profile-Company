<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanySettingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\ProductController;


Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/en', [LandingController::class, 'english'])->name('landing.en');


Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
Route::get('/en/about', [AboutController::class, 'english'])->name('about.en');
Route::get('/produk', [ProductController::class, 'index'])->name('products');
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('products.show');

// Contact Us routes
Route::get('/hubungi-kami', [ContactController::class, 'index'])->name('contact');
Route::post('/hubungi-kami', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/en/contact-us', [ContactController::class, 'english'])->name('contact.en');
Route::post('/en/contact-us', [ContactController::class, 'submitEnglish'])->name('contact.submit.en');

// English version routes
Route::get('/en/products', [ProductController::class, 'english'])->name('products.en');
Route::get('/en/products/{id}', [ProductController::class, 'showEnglish'])->name('products.show.en');

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

    // Product Landing Page
    Route::get('/product-landing', [\App\Http\Controllers\Admin\ProductLandingController::class, 'edit'])->name('product-landing.edit');
    Route::put('/product-landing', [\App\Http\Controllers\Admin\ProductLandingController::class, 'update'])->name('product-landing.update');

    // Product Management
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
});
