<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        /* $kategori = Kategori::all();
        View::share('kategori', $kategori);
        if(session('cart')){
            View::share('kategori', session('cart'));
        } */
        
    }
}
