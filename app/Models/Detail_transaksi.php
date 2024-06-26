<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Detail_transaksi extends Model
{   
    use HasRoles;
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $fillable = ['transaksi_id', 'menu_id', 'jumlah', 'subtotal'];

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function Menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
