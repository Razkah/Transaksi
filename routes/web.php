<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PdfController;
use App\Models\About;
use App\Models\Category;
use App\Models\Produk_titipan;
use App\Models\Transaksi;
use App\Policies\ProdukTitipanPolicy;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
route::resource('/transaksi', TransaksiController::class);
route::resource('/jenis', JenisController::class);
route::resource('/menu', MenuController::class);
route::resource('/category', CategoryController::class);
route::resource('/stock', StockController::class);
route::resource('/about', AboutController::class);
route::resource('/login', LoginController::class);
route::resource('/produk_titipan', ProdukTitipanController::class);
Route::get('export/produk_titipan', [ProdukTitipanController::class, 'exportData'])->name('raz');
Route::get('export/menu', [MenuController::class, 'exportData'])->name('ra');
Route::get('generate/produk_titipan', [ProdukTitipanController::class, 'generatePdf'])->name('aku');
Route::get('generate/menu', [MenuController::class, 'generatePdf'])->name('a');
Route::get('/generate-pdf', [PdfController::class, 'generatePdf']);
Route::get('/nota/{noFaktur}', [TransaksiController::class, 'faktur']);
