<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchCategoryProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/product-by-category/{id}',[HomeController::class,'product_by_category'])->name('product_by_category');
Route::get('/product-by-brand/{id}',[HomeController::class,'product_by_brand'])->name('product_by_brand');
Route::get('/search',[HomeController::class,'search_product'])->name('search_product');
Route::get('/product-details/{id}',[HomeController::class,'product_details'])->name('product_details');


    Route::get('/view-cart',[CartController::class,'viewCart'])->name('view_cart');
    Route::get('/add-cart',[CartController::class,'addCart'])->name('add_cart');
    Route::get('/remove-item-cart/{id}',[CartController::class,'removeItemCart'])->name('remove_item_cart');
    Route::get('/update-cart',[CartController::class,'updateCart'])->name('update_cart');
    // Route::post('/update-cart-ajax',[CartController::class,'updateCartAjax'])->name('update_cart_ajax');





Route::post('/send-verify-code', [CartController::class, 'sendVerifyCode'])->middleware(['auth'])->name('send-verify-code');
Route::post('/confirm-verify-code', [CartController::class, 'confirmVerifyCode'])->middleware(['auth'])->name('confirm-verify-code');
Route::get('/checkout',[CartController::class,'checkout'])/*->middleware('check_order_step_by_step')*/->name('checkout');
Route::post('/checkout-complete',[CartController::class,'checkoutComplete'])->middleware(['auth'])->name('checkout_complete');
Route::get('/view-order1',[CartController::class,'test_view_order'])->name('view_order1');
Route::get('/view-checkout-complete',[CartController::class,'order_complete'])->name('view_order_complete');

Route::get('/product-by-category/{name}/sort',[HomeController::class,'sort_list_product_category'])->name('sort_list_product_category');
Route::get('/product-by-brand/{name}/sort',[HomeController::class,'sort_list_product_brand'])->name('sort_list_product_brand');
Route::get('/product-by-category/{name}/filter',[HomeController::class,'filter_product_category'])->name('filter_product_category');

Route::get('/history-order',[OrderController::class,'view_order_history'])->middleware(['auth'])->name('view_order_history');
Route::get('/order-detail/{id}',[OrderController::class,'order_detail'])->middleware(['auth'])->name('order_detail');
Route::get('/destroy-order/{id}',[OrderController::class,'destroy_order'])->middleware(['auth'])->name('destroy_order');

