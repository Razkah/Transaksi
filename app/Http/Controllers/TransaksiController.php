<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Menu;
use App\Models\Jenis;
use App\Http\Requests\TransaksiRequest;
use App\Models\Detail_transaksi;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use PhpParser\Node\Stmt\Return_;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenis'] = Jenis::with(['menu'])->get();

        return view('transaksi.index')->with($data);
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
    public function store(TransaksiRequest $request)
    {
        try {
            $validated = $request->validated();

            $last_id = Transaksi::where('tanggal', date('y-m-d'))->orderBy('tanggal', 'desc')->select('id')->first();
            $noTrans = $last_id == null ? date('ymd') . '001' : date('ymd') . sprintf('%04d', substr($last_id, 8, 4));

            $insertTransaksi = Transaksi::create([
                'id' => $noTrans,
                'tanggal' => date('y-m-d'),
                'total_harga' => $validated['total'],
                'metode_pembayaran' => 'cash',
                'keterangan' => 'coba',
            ]);

            //input Detail Transaksi
            foreach ($request->orderedList as $detail) {
                Detail_transaksi::create([
                    'transaksi_id' => $insertTransaksi->id,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']
                ]);
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pemesanan Berhasil!', 'noTrans' => $insertTransaksi->id]);
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'Pemesanan Gagal', 'error' => $e->getMessage()]);
            db::rollBack();
        };
        return $insertTransaksi;
    }

    public function faktur($nofaktur)
    {
        try {
            $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detail_transaksi' => function ($query) {
                $query->with('menu');
            }])->first();

            return view('detail_transaksi.faktur')->with($data);
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'Pemesanan Gagal']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
