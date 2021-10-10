<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $guarded = [];

    public function detail_transaksi()
    {
       return $this->hasMany('App\DetailTransaksi', 'transaksi');
     
    }

    public function user_pembeli()
    {
    //    return $this->hasOne('App\User', 'id', 'user');
       return $this->belongsTo('App\User', 'user');
     
    }
}
