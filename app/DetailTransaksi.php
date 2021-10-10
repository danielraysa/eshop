<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    //
    protected $guarded = [];

    public function detail_produk()
    {
       return $this->belongsTo('App\Produk', 'produk');
     
    }
}
