<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;

class MenuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Menu([
            'nama_menu' => $row[0],
            'harga' => $row[1],
            'deskripsi' => $row[2],
            'jenis_id' => $row[3]
        ]);
    }
}
