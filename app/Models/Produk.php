<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function kategori(){
        return $this->belongsTo(KategoriProduk::class);
    }
    function transaksi(){
        return $this->hasMany(Transaksi::class);
    }

    function getTerjual(){
        Transaksi::where('status_pembayaran','Sudah Dibayara')->sum('qty');
    }
}
