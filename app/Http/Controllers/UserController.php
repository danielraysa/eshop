<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\User;
use Auth;

class UserController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        $transaksi = Transaksi::with('detail_transaksi.detail_produk')->where('user', $user->id)->get();
        $data['user'] = $user;
        $data['transaksi'] = $transaksi;
        return view('profile', $data);
    }

    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
}
