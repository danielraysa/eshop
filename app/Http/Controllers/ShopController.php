<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;

class ShopController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::get()->take(8);
        // $kategori = Kategori::get();
        // dd($produk);
        // return view('welcome', compact('produk', 'kategori'));
        return view('welcome', compact('produk'));
        // return view('new', compact('produk'));
    }
    
    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function blog()
    {
        return view('blog');
    }

    public function product()
    {
        $produk = Produk::paginate(9);
        // return view('product', compact('produk'));
        return view('shop-grid', compact('produk'));
    }

    public function product_show($id)
    {
        $produk = Produk::find($id);
        // return view('product', compact('produk'));
        return view('product', compact('produk'));
    }
    

}
