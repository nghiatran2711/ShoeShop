<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DetailPromotionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest:admin')->group(function(){
    Route::get('login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('login.handle');
});
Route::middleware('auth:admin')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    //brands
    Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
        Route::get('/list', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/show/{id}', [BrandController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BrandController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('destroy');
        Route::get('/search',[BrandController::class,'search'])->name('search');
    });
    //categories
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/list', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/search',[CategoryController::class,'search'])->name('search');
    });
    //sizes
    Route::group(['prefix' => 'size', 'as' => 'size.'], function () {
        Route::get('/list', [SizeController::class, 'index'])->name('index');
        Route::get('/create', [SizeController::class, 'create'])->name('create');
        Route::post('/store', [SizeController::class, 'store'])->name('store');
        Route::get('/show/{id}', [SizeController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [SizeController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SizeController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SizeController::class, 'destroy'])->name('destroy');
    });
    //products
    Route::group(['prefix' => 'Product', 'as' => 'product.'], function () {
        Route::get('/list', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('/search',[ProductController::class,'search'])->name('search');
    });
    // Route::group(['prefix' => 'product-size', 'as' => 'product_size.'], function () {
    //     Route::get('/addProductSize', [ProductSizeController::class, 'addProductSize'])->name('index');
        // Route::get('/create', [ProductSizeController::class, 'create'])->name('create');
        // Route::post('/store', [ProductSizeController::class, 'store'])->name('store');
        // Route::get('/show/{id}', [ProductSizeController::class, 'show'])->name('show');
        // Route::get('/edit/{id}', [ProductSizeController::class, 'edit'])->name('edit');
        // Route::put('/update/{id}', [ProductSizeController::class, 'update'])->name('update');
        // Route::delete('/delete/{id}', [ProductSizeController::class, 'destroy'])->name('destroy');
    // });
    // attribute of product
    Route::group(['prefix' => 'product/{product_id}', 'as' => 'product.'], function () {
        //size
        Route::group(['prefix' => 'size', 'as' => 'size.'], function () {
            Route::get('/list', [ProductSizeController::class, 'index'])->name('index');
            Route::get('/create', [ProductSizeController::class, 'create'])->name('create');
            Route::post('/store', [ProductSizeController::class, 'store'])->name('store');
            Route::get('/edit/{size_id}', [ProductSizeController::class, 'edit'])->name('edit');
            Route::put('/update/{size_id}', [ProductSizeController::class, 'update'])->name('update');
            Route::delete('/delete/{size_id}', [ProductSizeController::class, 'destroy'])->name('destroy');
        });
        //price
        Route::group(['prefix' => 'price', 'as' => 'price.'], function () {
            Route::get('/list', [PriceController::class, 'index'])->name('index');
            Route::get('/create', [PriceController::class, 'create'])->name('create');
            Route::post('/store', [PriceController::class, 'store'])->name('store');
            Route::get('/edit/{price_id}', [PriceController::class, 'edit'])->name('edit');
            Route::put('/update/{price_id}', [PriceController::class, 'update'])->name('update');
            Route::delete('/delete/{price_id}', [PriceController::class, 'destroy'])->name('destroy');
        });
        //promotion
            
    });
    Route::group(['prefix' => 'promotion', 'as' => 'promotion.'], function () {  
        Route::get('/list', [PromotionController::class, 'index'])->name('index');
        Route::get('/create', [PromotionController::class, 'create'])->name('create');
        Route::post('/store', [PromotionController::class, 'store'])->name('store');
        Route::get('/edit/{promotion_id}', [PromotionController::class, 'edit'])->name('edit');
        Route::put('/update/{promotion_id}', [PromotionController::class, 'update'])->name('update');
        Route::delete('/delete/{promotion_id}', [PromotionController::class, 'destroy'])->name('destroy');
    });   
    Route::group(['prefix' => 'promotion-detail', 'as' => 'promotion_detail.'], function () {  
        Route::get('/list', [DetailPromotionController::class, 'index'])->name('index');
        Route::get('/create', [DetailPromotionController::class, 'create'])->name('create');
    });  

    Route::group(['prefix' => 'order','as'=>'order.'],function () {
        Route::get('/list-order',[OrderController::class,'list_order'])->name('list_order');
        Route::get('/order-detail/{id}',[OrderController::class,'order_detail'])->name('order_detail');
        Route::get('/confirm-order/{id}',[OrderController::class,'confirm_order'])->name('confirm_order');
        Route::get('/search',[OrderController::class,'search'])->name('search');
    });

    Route::group(['prefix' => 'user','as'=>'user.'],function () {
        Route::get('/list',[UserController::class,'index'])->name('list_user');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/store',[UserController::class,'store'])->name('store');
        Route::get('/acvive/{id}',[UserController::class,'active'])->name('active_user');
        Route::get('/de-active/{id}',[UserController::class,'de_active'])->name('de_active_user');
        Route::get('reset-password/{id}',[UserController::class,'reset_password'])->name('reset_password');
        Route::post('update-password/{id}',[UserController::class,'update_password'])->name('update_password');
    });
    Route::group(['prefix' => 'customer','as'=>'customer.'],function () {
        Route::get('/list',[CustomerController::class,'index'])->name('list_customer');
        Route::get('/search',[CustomerController::class,'index'])->name('search');
    });


});