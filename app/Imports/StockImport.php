<?php

namespace App\Imports;

use App\Models\stock;
use Maatwebsite\Excel\Concerns\ToModel;

class StockImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Stock([
            'menu_id' => $row[0],
            'jumlah' => $row[1],
        ]);
    }
}
