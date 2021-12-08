<?php

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

Route::get('/', 'ShopController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('products', 'ShopController@product')->name('product');
Route::get('products/{id}', 'ShopController@product_show');
Route::get('about', 'ShopController@about')->name('about');
Route::get('contact', 'ShopController@contact')->name('contact');
Route::get('test', function () {
    return view('product-single');
});
// Route::resource('cart', CartController::class);
Route::get('cart','CartController@index')->name('cart.index');
Route::get('cart/{id}/add', 'CartController@store')->name('cart.store');
Route::get('shop-grid', 'ShopController@product');
Route::get('blog', 'ShopController@blog');

Route::middleware(['auth'])->group(function() {
    Route::get('profile','UserController@profile');
    Route::get('checkout','ShopController@checkout');
    Route::post('checkout','ShopController@saveCheckout');
    Route::get('checkout/success','ShopController@finishCheckout');
    Route::post('checkout/upload','ShopController@uploadReceipt');
});
// Route::get('/barang-api', [ProdukController::class, 'barang_api']);
Route::prefix('admin')->middleware(['auth','auth.admin'])->group(function() {
    /* Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('barang', ProdukController::class);
    Route::resource('kategori', KategoriController::class);
    Route::get('report', [LaporanController::class, 'index'])->name('report');
    Route::get('penjualan', [AdminController::class, 'input_transaksi'])->name('penjualan'); */
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('barang', 'ProdukController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('banner', 'SlideBannerController');
    Route::resource('penjualan', 'PenjualanController');
    Route::get('report', 'LaporanController@index')->name('report');
    // Route::get('penjualan', 'AdminController@input_transaksi')->name('penjualan');
});