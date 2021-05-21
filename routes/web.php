<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/product-by-category/{id}',[HomeController::class,'product_by_category'])->name('product_by_category');
Route::get('/product-by-brand/{id}',[HomeController::class,'product_by_brand'])->name('product_by_brand');
Route::get('/search',[HomeController::class,'search_product'])->name('search_product');
Route::get('/product-details/{id}',[HomeController::class,'product_details'])->name('product_details');
Route::get('/view-cart',[CartController::class,'viewCart'])->name('view_cart');
Route::get('/add-cart',[CartController::class,'addCart'])->name('add_cart');
Route::get('/remove-item-cart/{id}',[CartController::class,'removeItemCart'])->name('remove_item_cart');
Route::get('/update-cart',[CartController::class,'updateCart'])->name('update_cart');