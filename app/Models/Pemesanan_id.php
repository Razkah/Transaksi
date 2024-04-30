<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class pemesanan_id extends Model
{   
    use HasRoles;
    use HasFactory;
    
    protected $table = 'pemesanan_id';
    protected $fillable = ['meja_id', 'tanggal_pemesanan', 'jam_mulai', 'jam_selesai', 'nama_pemesan', 'jumlah_pelanggan'];
}
