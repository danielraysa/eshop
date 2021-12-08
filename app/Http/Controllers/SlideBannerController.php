<?php

namespace App\Http\Controllers;

use App\SlideBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SlideBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banner = SlideBanner::paginate(10);
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner.form');
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
        if(!is_dir(public_path('storage'))){
            Artisan::call('storage:link');
        }
        $path = Storage::putFile('public/banner', $request->file_gambar);
        SlideBanner::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'path_file' => $path,
        ]);
        return redirect()->route('banner.index')->with('status', ['class' => 'success', 'value' => 'Berhasil menambah slide banner']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SlideBanner  $slideBanner
     * @return \Illuminate\Http\Response
     */
    public function show(SlideBanner $slideBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SlideBanner  $slideBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(SlideBanner $slideBanner)
    {
        //
        return view('admin.banner.form', compact('slideBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SlideBanner  $slideBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlideBanner $slideBanner)
    {
        //
        if($request->gambar){
            if(!is_dir(public_path('storage'))){
                Artisan::call('storage:link');
            }
            $path = Storage::putFile('public/banner', $request->file_gambar);
            $slideBanner->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'path_file' => $path,
            ]);
        }else{
            $slideBanner->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }
        return redirect()->route('banner.index')->with('status', ['class' => 'success', 'value' => 'Berhasil mengupdate slide banner']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlideBanner  $slideBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlideBanner $slideBanner)
    {
        //
    }
}
