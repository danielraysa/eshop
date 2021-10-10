<?php
class Formatter {
    public function formatRupiah($money)
    {
        return "Rp. ".number_format($money,0,",",".");
    }
}