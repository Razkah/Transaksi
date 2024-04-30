<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Jenis extends Model
{   
    use HasRoles;
    use HasFactory;


    protected $table = 'jenis';
    protected $fillable = ['name', 'category_id'];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Menu()
    {
        return $this->hasMany(Menu::class);
    }
}
