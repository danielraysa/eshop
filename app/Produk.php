<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $guarded = [];
    protected $fillable = ['kategori', 'nama_produk', 'harga', 'stok', 'deskripsi'];

    public function kategori_produk()
    {
       return $this->belongsTo('App\Kategori', 'kategori');
     
    }

    public function gambar_produk()
    {
       return $this->hasMany('App\Gambar', 'produk');
     
    }

    public function gambar_preview()
    {
       return $this->hasOne('App\Gambar', 'produk');
     
    }

	public function produk_cart($jumlah)
	{
		return [
			'produk_id' => $this->id,
			'nama_produk' => $this->nama_produk,
			'harga' => $this->harga,
			'jumlah' => $jumlah,
			'sub_total' => $jumlah * $this->harga,
		];
	}
}
