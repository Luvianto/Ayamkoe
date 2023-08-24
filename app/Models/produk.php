<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $guarded = ['id'];

    public function pesanan():HasMany{
         return $this->hasMany(pesanan::class);
    }
}
