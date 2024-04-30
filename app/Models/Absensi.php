<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Absensi extends Model
{   
    use HasRoles;
    use HasFactory;

    // Kumpulan nilai atau elemen yang disimpan dalam satu variabel.
    // Array index nomor yang digunakan untuk mengidentifikasi posisi atau lokasi dari sebuah elemen dalam array. 
    // Array value mengacu pada nilai-nilai yang disimpan dalam sebuah array. 
    protected $table = 'absensi';
    protected $fillable = ['nama_karyawan', 'tanggal_masuk', 'waktu_masuk', 'status', 'waktu_keluar'];
}
