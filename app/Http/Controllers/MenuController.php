<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Jenis;
use App\Imports\MenuImport;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\MenuExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::with('jenis')->get();
        $jenis = Jenis::all();
        

        return view('menu.index', compact('menu', 'jenis'));
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
    public function store(StoreMenuRequest $request)
    {
        DB::beginTransaction();
        Menu::create($request->all());
        DB::commit();
        return redirect('menu')->with('success', 'Data produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }


    public function importData(Request $request )
{
    Excel::import(new MenuImport, $request->import);

    return redirect('menu')->with('success', 'Menu imported successfully!');
}

public function exportMenu()
{
    return Excel::download(new MenuExport, 'menu.xlsx');
}

    public function downloadPdf(){
        $data['menu']=Menu::get();
        $pdf = Pdf::loadView('menu.pdfView',$data);
        return $pdf->stream('');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        return redirect('menu')->with('success', 'Update barang berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('menu')->with('success', 'Data Berhasil Dihapus!');
    }
}
