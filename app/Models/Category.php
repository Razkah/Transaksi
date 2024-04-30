<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{   
    use HasRoles;
    use HasFactory;

    protected $table = 'category';
    protected $fillable = ['name'];

    public function Jenis()
    {
        return $this->hasMany(Jenis::class, 'jenis_id', 'id');
    }
}
