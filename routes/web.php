<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardHomeBannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardProductStockController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function() {
    return view('about');
});

Route::get('/refund-policy', function() {
    return view('refund');
});

Auth::routes();

// Product

Route::controller(ShopController::class)->group(function () {
    Route::get('/shop', 'index')->name('shop');
});

Route::post('/add-rating', [RatingsController::class, 'addRating']);

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories/{id}', 'index');
    Route::get('/categories', 'view');
});

// Order

Route::controller(OrderController::class)->group(function () {
    Route::get('/order/{id}', 'index');
    Route::post('/order/{id}', 'order');
    Route::get('/check-out', 'check_out');
    Route::delete('/check-out/{id}', 'delete');
});

// Invoice / History Order

Route::controller(HistoryController::class)->group(function () {
    Route::get('/history/{id}', 'detail')->middleware('checkOrderOwnership');
    Route::get('/history', 'index');
    Route::get('/export-invoice/{id}', 'exportPdf');
});

// Profile User

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index');
    Route::post('/profile', 'update');
    Route::get('/province/{id}/cities', 'getCities');
});

// Dashboard

Route::middleware(['role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/products', DashboardProductController::class);
    Route::resource('/dashboard/categories', DashboardCategoryController::class);
    
    Route::controller(DashboardOrderController::class)->group(function () {
        Route::get('/dashboard/order', 'index');
        Route::get('/dashboard/order/export', 'export_excel');
        Route::get('/dashboard/order/detail/{id}', 'detail');
        Route::post('/resi/{id}', 'resi');
    });

    Route::resource('/dashboard/home-banners', DashboardHomeBannerController::class);
    
    Route::get('/dashboard/ratings', [RatingsController::class, 'ratings']);
    Route::delete('/dashboard/ratings/{id}', [RatingsController::class, 'destroy']);

    route::get('/lowstock',[ DashboardProductStockController::class, 'notifStock']);

});

Route::get('message/{id}', function() {
    return redirect('shop')->withError('Maaf stock tidak mencukupi');
});