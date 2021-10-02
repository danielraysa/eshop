<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\User;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        $data['kategori'] = $kategori;
        // session()->forget('cart');
        if(session('cart') == null){
            session(['cart' => collect()]);
        }
        $cart  = session('cart');
        // dd($cart);
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
        // dd($item_list);
        return view('cart', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        //
        if(session('cart') == null){
            session(['cart' => collect()]);
        }
        // $cart = collect(session('cart'));
        $cart = session('cart');
        // dd($cart);
        if(!empty($cart)){
            
            $find_item = $cart->where('produk_id', $id)->first();
            
            if($find_item){
                $new_cart = $cart->map(function ($item, $key) use ($id) {
                    if($item['produk_id'] == $id){
                        $item['jumlah'] = $item['jumlah'] + 1;
                    }
                    return $item;
                });
                session(['cart' => $new_cart]);
            }else{
                $request->session()->push('cart', ['produk_id' => $id, 'jumlah' => 1]);
            }
        }else{
            $request->session()->push('cart', ['produk_id' => $id, 'jumlah' => 1]);
        }
        // dd($cart);
        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Berhasil menambahkan barang']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cart = session('cart');
        
        $new_cart = $cart->filter(function ($item, $key) use ($id){
            if($item['produk_id'] == $id){
                return false;
            }
            return true;
        });
        session(['cart' => $new_cart]);
        
        return redirect()->back();
    }
}
