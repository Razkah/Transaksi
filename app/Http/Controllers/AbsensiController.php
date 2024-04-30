<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\AbsensiExport;
use App\Exports\AbsensiImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Parameter adalah variabel yang digunakan dalam deklarasi method atau fungsi untuk menerima nilai input dari luar.
    public function index()
    {
        $data['absensi'] = Absensi::orderBy('created_at', 'ASC')->get();

    // Return adalah pernyataan yang digunakan dalam method atau fungsi untuk mengembalikan nilai kepada pemanggil.
        return view('absensi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsensiRequest $request)
    {
        DB::beginTransaction();
        Absensi::create($request->all());
        DB::commit();
        return redirect('absensi')->with('success', 'Data absensi berhasil ditambahkan!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date . 'absensi.xlsx');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        // Mengambil data dari permintaan
        $data = $request->all();

        
        // Jika status diubah menjadi 'sakit' atau 'cuti', atur waktu keluar ke '00:00:00'
        if ($data['status'] === 'sakit' || $data['status'] === 'cuti') {
            $data['waktu_keluar'] = '00:00:00';
        }

        // Memperbarui data absensi dengan data yang baru
        $absensi->update($data);

        return redirect('absensi')->with('success', 'Update absensi berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect('absensi')->with('success', 'Data Berhasil Dihapus!');
    }

    public function downloadPdf()
    {
        $data['absensi'] = Absensi::get();
        $pdf = Pdf::loadView('absensi.pdfView', $data);
        return $pdf->stream('');
    }
}
