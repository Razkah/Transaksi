<?php

namespace App\Exports;

use App\Models\Absensi as ModelsAbsensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsAbsensi::all();
    }

    public function headings():array{
        return[
            'no',
            'Nama Karyawan',
            'Tanggal Masuk',
            'Waktu Masuk',
            'Status',
            'Waktu Keluar',
            'Created At',
        ];
    }
}
