<?php

namespace App\Http\Controllers;

use App\Models\Produk_titipan;
use App\Http\Requests\StoreProduk_titipanRequest;
use App\Http\Requests\UpdateProduk_titipanRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\Produk_titipanExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use PDOException;
use Exception;
use Illuminate\Database\QueryException;


class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['produk_titipan'] = Produk_titipan::orderBy('created_at', 'ASC')->get();

        return view('produk_titipan.index')->with($data);
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
    public function store(StoreProduk_titipanRequest $request)
    {
        DB::beginTransaction();
        Produk_titipan::create($request->all());
        DB::commit();
        return redirect('produk_titipan')->with('success', 'Data produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk_titipan $produk_titipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk_titipan $produk_titipan)
    {
    }


    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new Produk_titipanExport, $date . 'produk_titipan.xlsx');
    }

    public function generatePdf()
    {
        $produk_titipan = Produk_titipan::all();
        $pdf = Pdf::loadView('produk_titipan.data', compact('produk_titipan'));
        return $pdf->download('produk_titipan.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduk_titipanRequest $request, Produk_titipan $produk_titipan)
    {
        $produk_titipan->update($request->all());

        return redirect('produk_titipan')->with('success', 'Update barang berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk_titipan $produk_titipan)
    {
        $produk_titipan->delete();

        return redirect('produk_titipan')->with('success', 'Data Berhasil Dihapus!');
    }
}
