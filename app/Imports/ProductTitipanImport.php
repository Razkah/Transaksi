<?php

namespace App\Imports;

use App\Models\Produk_titipan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProdukTitipanImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Produk_titipan::create([
                'nama_produk' => $row[0],
                'nama_suplier' => $row[1],
                'harga_beli' => $row[2],
                'harga_jual' => $row[3],
                'stock' => $row[4],
                'keterangan' => $row[5],
                // Tambahkan kolom lain sesuai dengan kebutuhan Anda
            ]);
        }
    }
}
