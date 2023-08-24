<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = ['idProduk','idPembayaran','jumlah'];

    public function produk()
    {
        return $this->belongsTo(produk::class,'idProduk');
    }

    public function pembayaran()
    {
        return $this->belongsTo(pembayaran::class,'idPembayaran');
    }
}
