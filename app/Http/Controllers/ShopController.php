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
        $kategori = Kategori::all();
        $data['produk'] = $produk;
        $data['kategori'] = $kategori;
        return view('welcome', $data);
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

    public function product(Request $request)
    {
        $produk = Produk::paginate(9);
        if($request->kategori){
            $produk = Produk::where('kategori', $request->kategori)->paginate(9);
        }
        $kategori = Kategori::all();
        $data['produk'] = $produk;
        $data['kategori'] = $kategori;
        return view('shop-grid', $data);
    }

    public function product_show($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        $data['produk'] = $produk;
        $data['kategori'] = $kategori;
        return view('product', $data);
    }
    

}
