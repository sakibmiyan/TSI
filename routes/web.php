<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', function () {
    //     return view('home');
    // });
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/addUser', [HomeController::class, 'addUser'])->name('user');
    Route::post('/storeUser', [HomeController::class, 'storeUser'])->name('userStore');
    Route::get('/deleteUser/{id}', [HomeController::class, 'deleteUser'])->name('deleteUser');

    //brand
    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brandCreate');
    Route::get('/brand/{brandId}', [BrandController::class, 'edit'])->name('brandEdit');
    Route::post('/brand', [BrandController::class, 'store'])->name('brandStore');
    Route::post('/brand/{brandId}/update', [BrandController::class, 'update'])->name('brandUpdate');
    Route::get('/brand/delete/{brandId}', [BrandController::class, 'destroy'])->name('brandDelete');

    //Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('categoryCreate');
    Route::get('/category/{categoryId}', [CategoryController::class, 'edit'])->name('categoryEdit');
    Route::post('/category', [CategoryController::class, 'store'])->name('categoryStore');
    Route::post('/category/{categoryId}/update', [CategoryController::class, 'update'])->name('categoryUpdate');
    Route::get('/category/delete/{categoryId}', [CategoryController::class, 'destroy'])->name('categoryDelete');

    //Product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('productCreate');
    Route::get('/product/{productId}', [ProductController::class, 'edit'])->name('productEdit');
    Route::post('/product', [ProductController::class, 'store'])->name('productStore');
    Route::post('/product/{productId}/update', [ProductController::class, 'update'])->name('productUpdate');
    Route::get('/product/delete/{productId}', [ProductController::class, 'destroy'])->name('productDelete');

    //Order
    Route::get('/add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('addToCart');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/order/create', [OrderController::class, 'create'])->name('orderCreate');
    Route::post('/order', [OrderController::class, 'store'])->name('orderStore');
    Route::get('/order/delete/{orderId}', [OrderController::class, 'destroy'])->name('orderDelete');
    Route::post('/update-cart/{id}', [OrderController::class, 'updateCart'])->name('update.cart');
    Route::get('/deletecart/{id}', [OrderController::class, 'remove'])->name('removeCart');
    Route::get('/go-to-checkout', [OrderController::class, 'checkout'])->name('checkOut');
    Route::post('/cart/checkout/confirm', [OrderController::class, 'confirmCheckout'])->name('confirmCheckout');
    Route::get('/invoice/{orderId}', [OrderController::class, 'invoice'])->name('invoice');
    Route::get('/report', [OrderController::class, 'report'])->name('report');
    Route::post('/report', [OrderController::class, 'reportView'])->name('reportView');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
