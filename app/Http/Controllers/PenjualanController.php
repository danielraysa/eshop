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
        return view('admin.penjualan.index');
    }
}
