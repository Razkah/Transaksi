<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Produk_titipan extends Model
{   
    use HasRoles;
    use HasFactory;

    protected $table = 'produk_titipan';
    protected $fillable = ['nama_produk', 'nama_suplier', 'harga_beli', 'harga_jual', 'stock', 'keterangan'];
}
