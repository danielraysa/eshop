<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    //
    protected $guarded = [];

    public function getFile()
    {
        return asset(str_replace('public', 'storage', $this->path_file));
    }
}
