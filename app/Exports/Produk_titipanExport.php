<?php

namespace App\Exports;

use App\Models\Produk_titipan;
use Maatwebsite\Excel\Concerns\FromCollection;


class Produk_titipanExport implements FromCollection
{
    public function collection()
    {
        return Produk_titipan::all();
    }
}
