<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Stock;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        // Mendapatkan data menu
        $menu = Menu::get();
        $data['count_menu'] = $menu->count();

        // Mendapatkan data stok
        $stock = Stock::orderBy('jumlah')->limit(5)->get();
        $data['stock'] = $stock;

        // Mendapatkan total harga dari semua transaksi
        $total_harga = DB::table('transaksi')->sum('total_harga');

        

        // Menghitung pendapatan per tanggal
        $transaksi = Transaksi::all();
        $pendapatanPerTanggal = $transaksi->groupBy(function ($date) {
            return Carbon::parse($date->tanggal)->format('m/d');
        })->map->sum('total_harga');


        // Mengirimkan total harga dan pendapatan per tanggal ke tampilan
        return view('grafik.data', [
            'total_harga' => $total_harga,
            'pendapatanPerTanggal' => $pendapatanPerTanggal,
        ] + $data);
    }



    public function filterData(Request $request)
    {
        // Tangkap data tanggal dari permintaan
        $tanggal = $request->tanggal;

        // Filter data berdasarkan tanggal
        $filteredData = DB::table('nama_tabel')->whereDate('created_at', $tanggal)->get();

        // Kirim data hasil filter ke tampilan
        return view('hasil-filter', ['data' => $filteredData, 'tanggal' => $tanggal]);
    }
}
