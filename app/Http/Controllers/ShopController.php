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
        $kategori = Kategori::all();
        $data['kategori'] = $kategori;
        return view('contact', $data);
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
        $kategori = Kategori::all();
        $data['kategori'] = $kategori;
        // session()->forget('cart');
        if(session('cart') == null){
            session(['cart' => collect()]);
        }
        $cart  = session('cart');
        $item_list = $cart->map(function ($item) {
            $produk = Produk::find($item['produk_id']);
            return [
                'produk_id' => $produk->id,
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga,
                'jumlah' => $item['jumlah'],
                'sub_total' => $item['jumlah'] * $produk->harga,
            ];
        });
        $data['item_list'] = $item_list;
        return view('checkout', $data);
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
        /* if($request->search){
            $produk = Produk::whereRaw("nama_produk like '%".$request->search."%'")->paginate(9);
        } */
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
