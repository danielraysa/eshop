<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Produk;
use App\Kategori;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(session('cart') == null){
            session(['cart' => collect()]);
        }
        view()->composer('layouts.eshop', function ($view){
            $kategori = Kategori::all();
            $view->with('kategori', $kategori);
        
            $cart = session('cart');
            $item_list = $cart->map(function ($item) {
                $produk = Produk::find($item['produk_id']);
                return $produk->produk_cart($item['jumlah']);
            });
            $view->with('cart_list', $item_list);
        });
        
    }
}
