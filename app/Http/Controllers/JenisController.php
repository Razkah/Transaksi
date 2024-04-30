<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Category;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\JenisExport;
use App\Imports\JenisImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = Jenis::with('category')->get();
        $category = Category::all();

        return view('jenis.index', compact('jenis', 'category'));
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
    public function store(StoreJenisRequest $request)
    {
        DB::beginTransaction();
        Jenis::create($request->all());
        DB::commit();
        return redirect('jenis')->with('success', 'Data produk berhasil ditambahkan!');
    }


    public function importData(Request $request)
    {
        Excel::import(new JenisImport, $request->import);

        return redirect('jenis')->with('success', 'Menu imported successfully!');
    }

    public function exportJenis()
{
    return Excel::download(new JenisExport, 'jenis.xlsx');
}

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    public function generatePdf()
    {
        $jenis = Jenis::all();
        $pdf = pdf::loadView('jenis.data', compact('jenis'));
        return $pdf->download('jenis.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, Jenis $jenis)
    {
        $jenis->update($request->all());

        return redirect('jenis')->with('success', 'Update barang berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jenis)
    {
        $jenis->delete();

        return redirect('jenis')->with('success', 'Data Berhasil Dihapus!');
    }
}
