<?php

namespace App\Http\Controllers;

use App\Models\stock;
use App\Models\menu;
use App\Http\Requests\StorestockRequest;
use App\Http\Requests\UpdatestockRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\StockExport;
use App\Imports\StockImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = Stock::with('menu')->get();
        $menu = Menu::all();

        return view('stock.index', compact('stock', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockRequest $request)
    {
        DB::beginTransaction();
        Stock::create($request->all());
        DB::commit();
        return redirect('stock')->with('success', 'Data produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stock $stock)
    {
        //
    }

    public function exportStock()
    {
        return Excel::download(new StockExport, 'stock.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new StockImport, $request->import);

        return redirect('stock')->with('success', 'stock imported successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, stock $stock)
    {
        $stock->update($request->all());

        return redirect('stock')->with('success', 'Update barang berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stock $stock)
    {
        $stock->delete();

        return redirect('stock')->with('success', 'Data Berhasil Dihapus!');
    }
}
