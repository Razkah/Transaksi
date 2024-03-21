<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;

    protected $table = 'stock';
    protected $fillable = ['menu_id', 'jumlah'];

    public function menu()
    {
        return $this->belongsTo(menu::class);
    }
}
