<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\CategoryExport;
use App\Imports\CategoryImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['category'] = category::orderBy('created_at', 'ASC')->get();

        return view('category.index')->with($data);
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
    public function store(StoreCategoryRequest $request)
    {
        DB::beginTransaction();
        Category::create($request->all());
        DB::commit();
        return redirect('category')->with('success', 'Data produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect('category')->with('success', 'Update barang berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('category')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new CategoryExport, $date . 'category.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new CategoryImport, $request->import);

        return redirect('category')->with('success', 'Category imported successfully!');
    }

    public function downloadPdf()
    {
        $data['category'] = Category::get();
        $pdf = Pdf::loadView('category.pdfView', $data);
        return $pdf->stream('');
    }
}
