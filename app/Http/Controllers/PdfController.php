<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        // Contoh data yang ingin ditampilkan dalam PDF
        $data = [
            'title' => 'PDF Example',
            'content' => 'Ini adalah konten PDF yang dihasilkan dari Laravel.'
        ];

        // Render view PDF dengan data
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf', $data));

        // Atur ukuran kertas dan orientasi
        $pdf->setPaper('A4', 'portrait');

        // Render HTML ke PDF
        $pdf->render();

        // Outputkan PDF ke browser
        return $pdf->stream('document.pdf');
    }
}
