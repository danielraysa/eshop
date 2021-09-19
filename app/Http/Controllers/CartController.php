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
        $cart  = session('cart');
        $item_list = $cart->map(function ($item) {
            $produk = Produk::find($item['produk_id']);
            return [
                'produk_id' => $produk->id,
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga,
                'jumlah' => $item['jumlah'],
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
        $cart = collect(session('cart'));
        // dd($cart);
        if(!empty($cart)){
            $modified = 0;
            $new_cart = $cart->map(function ($item, $key) use ($id, $modified) {
                if($item['produk_id'] == $id){
                    $item['jumlah'] = $item['jumlah'] + 1;
                }
                return $item;
            });
            for($i = 0; $i < count($new_cart); $i++){
                if($new_cart[$i]['jumlah'] != $cart[$i]['jumlah']){
                    $modified = 1;
                    break;
                }
            }
            // dd($new_cart, $modified);
            if($modified == 1){
                // $request->session()->forget('cart');
                // $request->session()->push('cart', $new_cart);
                session(['cart' => $new_cart]);
            }else{
                $request->session()->push('cart', ['produk_id' => $id, 'jumlah' => 1]);
            }
        }else{
            $request->session()->push('cart', ['produk_id' => $id, 'jumlah' => 1]);
        }
        return redirect()->back();
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
    }
}
