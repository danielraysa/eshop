<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Transaksi;
use App\DetailTransaksi;
use App\User;

class PenjualanController extends Controller
{
    //
    public function index()
    {
        $transaksi = Transaksi::with('user_pembeli','detail_transaksi.detail_produk')->paginate(10);
        $data['transaksi'] = $transaksi;
        // dd($transaksi);
        return view('admin.penjualan.index', $data);
    }
}
