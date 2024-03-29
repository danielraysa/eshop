<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;
use App\Transaksi;
use App\DetailTransaksi;
use App\SlideBanner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    //
    public function index()
    {
        $banner = SlideBanner::take(4)->get();
        $produk = Produk::take(8)->get();
        $data['produk'] = $produk;
        $data['banner'] = $banner;
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
        if(session('cart') == null){
            session(['cart' => collect()]);
        }
        $cart  = session('cart');
        $item_list = $cart->map(function ($item) {
            $produk = Produk::find($item['produk_id']);
            return $produk->produk_cart($item['jumlah']);
        });
        $data['item_list'] = $item_list;
        // dd($item_list);
        return view('checkout', $data);
    }

    public function saveCheckout(Request $request)
    {
        $cart  = session('cart');
        $user = Auth::user();
        $item_list = $cart->map(function ($item) {
            $produk = Produk::find($item['produk_id']);
            return $produk->produk_cart($item['jumlah']);
        });
        $transfer = null;
        if($request->file_receipt){
            if(!is_dir(public_path('storage'))){
                // mkdir(public_path('uploads'));
                Artisan::call('storage:link');

            }
            // $path = Storage::put('uploads', $gambar);
            $transfer = Storage::putFile('public/receipt', $request->file_receipt);
        }
        $transaksi = Transaksi::create([
            'user' => $user->id,
            'address' => $request->address,
            'phone_number' => $request->number,
            'payment_method' => $request->payment,
            'total' => $item_list->sum('sub_total'),
            'transfer_receipt' => $transfer
        ]);
        foreach($item_list as $item){
            $detail = DetailTransaksi::create([
                'transaksi' => $transaksi->id,
                'produk' => $item['produk_id'],
                'harga' => $item['harga'],
                'jumlah' => $item['jumlah'],
            ]);
        }
        session(['cart' => collect()]);
        
        return redirect('/')->with('alert', ['type' => 'success', 'message' => 'Berhasil memesan produk']);
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
        $data['produk'] = $produk;
        // return view('product', $data);
        return view('product-single', $data);
    }
    

}
