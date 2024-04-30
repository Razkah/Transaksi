<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan_id;
use App\Http\Requests\StorePemesanan_idRequest;
use App\Http\Requests\UpdatePemesanan_idRequest;
use App\Policies\PemesananIdPolicy;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class PemesananIdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pemesanan_id'] = Pemesanan_id::orderBy('created_at', 'ASC')->get();

        return view('pemesanan_id.index')->with($data);
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
    public function store(StorePemesanan_idRequest $request)
    {
        DB::beginTransaction();
        Pemesanan_id::create($request->all());
        DB::commit();
        return redirect('pemesanan_id')->with('success', 'Data pemesanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pemesanan_id $pemesanan_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemesanan_id $pemesanan_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesanan_idRequest $request, pemesanan_id $pemesanan_id)
    {
        $pemesanan_id->update($request->all());

        return redirect('pemesanan_id')->with('success', 'Update barang berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan_id $pemesanan_id)
    {
        $pemesanan_id->delete();

        return redirect('pemesanan_id')->with('success', 'Data Berhasil Dihapus!');
    }
}
