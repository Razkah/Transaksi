<?php

namespace App\Imports;
use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;

class PelangganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pelanggan([
            'nama' => $row[0],
            'email' => $row[1],
            'no_telepon' => $row[2],
            'alamat' => $row[3],
        ]);
    }
}
