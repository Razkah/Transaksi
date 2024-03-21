<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePembayaranRequest $request)
    {
        // try {

        //     $last_id = Pembayaran::where('tanggal', date('y-m-d'))->orderBy('tanggal', 'desc')->select('id')->first();
        //     $noTrans = $last_id == null ? date('ymd') . '001' : date('ymd') . sprintf('%04d', substr($last_id, 8, 4));

        //     $insertPembayaran = Pembayaran::create([
        //         'id' => $noTrans,
        //         'tanggal' => date('y-m-d'),
        //         'total_harga' => $request->total,
        //         'metode_pembayaran' => 'cash',
        //         'keterangan' => '',
        //     ]);
        // } catch (Exception | QueryException | PDOException $e) {
        //     return $e;
        //     db::rollBack();
        // }
        // return $insertPembayaran;
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
