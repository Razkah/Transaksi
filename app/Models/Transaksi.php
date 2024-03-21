<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['tanggal', 'total_harga', 'metode_pembayaran', 'keterangan'];
    protected $guarded = ['created_at', 'updated_at'];

    public function Detail_transaksi()
    {
        return $this->hasMany(Detail_transaksi::class);
    }
}
