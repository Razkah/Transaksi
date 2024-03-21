<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_titipan extends Model
{
    use HasFactory;

    protected $table = 'produk_titipan';
    protected $fillable = ['nama_produk', 'nama_suplier', 'harga_beli', 'harga_jual', 'stock', 'keterangan'];
}
