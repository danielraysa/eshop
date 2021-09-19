<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use App\Gambar;
use Illuminate\Http\Request;
use Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produk = Produk::paginate(10);
        // $produk = Produk::all();
        // dd($produk);
        return view('admin.barang.index', compact('produk'));
    }

    public function barang_api()
    {
        //
        // $produk = Produk::with('kategori')->get();
        $produk = Produk::all();
        // dd($produk);
        return response()->json($produk, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('admin.barang.form', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // if(isset($request->file_gambar)){
            $temp_path = [];
            if(!is_dir(public_path('storage'))){
                // mkdir(public_path('uploads'));
                \Artisan::call('storage:link');

            }
            foreach($request->file_gambar as $gambar){
                // $path = Storage::put('uploads', $gambar);
                $path = Storage::putFile('public/uploads', $gambar);
                array_push($temp_path, $path);
            }
        // }
        // dd($request->all(), $temp_path);
        $produk = Produk::create([
            'kategori' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ]);
        foreach($temp_path as $tmp){
            Gambar::create([
                'produk' => $produk->id,
                'path_file' => $tmp,
            ]);
        }
        return redirect()->route('barang.index')->with('status', ['class' => 'success', 'value' => 'Berhasil menambah produk']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Kategori::all();
        $produk = Produk::find($id);
        return view('admin.barang.form', compact('kategori', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Produk::find($id)->update([
            'kategori' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ]);
        $gambars = Gambar::where('produk', $id)->get();
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
