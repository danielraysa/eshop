<?php

namespace App\Helper;

class Formatter {
    public static function formatRupiah($money)
    {
        return "Rp. ".number_format($money,0,",",".");
    }
}