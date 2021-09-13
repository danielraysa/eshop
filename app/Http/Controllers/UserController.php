<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    //
    public function profile()
    {
        return view('profile');
    }

    public function index()
    {
        return view('admin.user.index');
    }
}
