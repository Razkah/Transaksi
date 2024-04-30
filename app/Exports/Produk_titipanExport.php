<?php

namespace App\Exports;

use App\Models\Produk_titipan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Produk_titipanExport implements FromView, WithStyles
{
    use Exportable;

    public function view(): View
    {
        return view('produk_titipan.exportProduk', [
            'produk_titipan' => Produk_titipan::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => '2C3E50'],
            ],
        ];

        // Apply style to header
        $sheet->getStyle('A1:J1')->applyFromArray($headerStyle);

        // Get total rows
        $totalRows = count($sheet->toArray());

        // Apply center alignment to data rows
        $sheet->getStyle('A2:G' . $totalRows)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }
}
