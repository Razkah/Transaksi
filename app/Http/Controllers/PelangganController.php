<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Illuminate\Support\Facades\DB;
use App\Imports\PelangganImport;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::orderBy('created_at', 'ASC')->get();

        return view('pelanggan.index')->with($data);
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
    public function store(StorePelangganRequest $request)
    {
        DB::beginTransaction();
        Pelanggan::create($request->all());
        DB::commit();
        return redirect('pelanggan')->with('success', 'Data pemesanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    public function importData(Request $request)
    {
        Excel::import(new PelangganImport, $request->import);

        return redirect('pelanggan')->with('success', 'Pelanggan imported successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());

        return redirect('pelanggan')->with('success', 'Update barang berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect('pelanggan')->with('success', 'Data Berhasil Dihapus!');
    }
}
