<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = ['nama_menu', 'harga', 'deskripsi', 'jenis_id'];

    public function Jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function Stock()
    {
        return $this->hasMany(stock::class);
    }

    public function Detail_transaksi()
    {
        return $this->hasMany(Detail_transaksi::class);
    } 
}
