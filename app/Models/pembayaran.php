<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['idUser','metodePembayaran','status'];

    public function pesanan(): HasMany
    {
        return $this->hasMany(pesanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'idUser');
    }
}
