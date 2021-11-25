<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Transaksi;
use App\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    public function index()
    {
        // $d_transaksi = DetailTransaksi::select('produk', 'produks.nama_produk', 'kategoris.nama_kategori', DB::raw('SUM(jumlah) sub_jumlah'), DB::raw('SUM(detail_transaksis.harga * jumlah) sub_total'))->groupBy('produk')->join('produks', 'produks.id', 'detail_transaksis.produk')->join('kategoris', 'kategoris.id', 'produks.kategori')->get();
        $d_transaksi = DetailTransaksi::with('detail_produk.kategori_produk')->select('produk', DB::raw('SUM(jumlah) sub_jumlah'), DB::raw('SUM(harga * jumlah) sub_total'))->groupBy('produk')->get();
        // dd($d_transaksi);
        // $transaksi = Transaksi::with('user_pembeli', 'detail_transaksi.detail_produk')->orderBy('created_at', 'desc')->get();
        // $data['transaksi'] = $transaksi;
        $data['d_transaksi'] = $d_transaksi;
        return view('admin.report', $data);
    }
}
