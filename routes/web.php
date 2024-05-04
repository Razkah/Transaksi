<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PemesananIdController;
use App\Http\Controllers\DataMenuController;
use App\Faker\GenerateFakeData;
use App\Http\Controllers\DataMenuContoller;
use App\Models\About;
use App\Models\Absensi;
use App\Models\Category;
use App\Models\Pelanggan;
use App\Models\Produk_titipan;
use App\Models\Transaksi;
use App\Policies\ProdukTitipanPolicy;
use GuzzleHttp\Middleware;
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


//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/auth', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// route::resource('/login', LoginController::class);


//route yang sudah login'
Route::group(['middleware' => 'auth'], function () {
    route::get('/', [HomeController::class, 'index']);
    route::resource('/contact', ContactController::class);
    route::resource('/produk_titipan', ProdukTitipanController::class);
    route::resource('/about', AboutController::class);

    Route::group(['middleware' => 'cekUserLogin:1'], function () {
        route::resource('/jenis', JenisController::class);
        route::resource('/category', CategoryController::class);
        route::resource('/stock', StockController::class);
        route::resource('/absensi', AbsensiController::class);
        route::resource('/pelanggan', PelangganController::class);
        route::get('grafik', [DataController::class, 'index']);
    });

    //route untuk kasir
    Route::group(['middleware' => 'cekUserLogin:2'], function () {
        route::resource('/transaksi', TransaksiController::class);
        route::resource('/pemesanan_id', PemesananIdController::class);
        route::resource('/menu', MenuController::class);
    });
});



//pelanggan
Route::post('import-pelanggan', [PelangganController::class, 'importData']);
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('export.pelanggan');
Route::get('generate/pelanggan', [MenuController::class, 'downloadPdf'])->name('exportPdf_pelanggan');

//produk titipan
Route::get('export/produk_titipan', [ProdukTitipanController::class, 'exportData'])->name('raz');
Route::get('generate/produk_titipan', [ProdukTitipanController::class, 'generatePdf'])->name('aku');
Route::post('/import-produk-titipan', 'App\Http\Controllers\ProdukTitipanController@import')->name('import.produk.titipan');

//menu
Route::get('generate/menu', [MenuController::class, 'downloadPdf'])->name('exportPdf_menu');
Route::get('export/menu', [MenuController::class, 'exportMenu'])->name('export.menu');
Route::post('import-menu', [MenuController::class, 'importData']);

//absensi
Route::get('generate/absensi', [AbsensiController::class, 'downloadPdf'])->name('exportPdf_absensi');
Route::get('export/absensi', [AbsensiController::class, 'exportData'])->name('raza');
Route::put('/absensi/{id}', 'AbsensiController@update')->name('absensi.update');
Route::put('/absensi/{id}/update-status', [AbsensiController::class, 'updateStatus'])->name('update-status');

//jenis
Route::post('import-jenis', [JenisController::class, 'importData']);
Route::get('generate/jenis', [JenisController::class, 'downloadPdf'])->name('exportPdf_jenis');
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('export.jenis');

//category
Route::get('export/category', [CategoryController::class, 'exportData'])->name('export.category');
Route::post('import-category', [CategoryController::class, 'importData']);
Route::get('generate/category', [CategoryController::class, 'downloadPdf'])->name('exportPdf_category');


//stock
Route::get('export/stock', [StockController::class, 'exportStock'])->name('export.stock');
Route::post('import-stock', [StockController::class, 'importData']);
Route::get('generate/stock', [StockController::class, 'downloadPdf'])->name('exportPdf_stock');

Route::get('/export-pdf', [PdfController::class, 'exportPDF'])->name('export.pdf');
Route::get('/nota/{noFaktur}', [TransaksiController::class, 'faktur']);

//fake data
Route::get('/generate-fake-data', [ProdukTitipanController::class, 'generateFakeData']);

//filter data
Route::get('filter', [DataController::class, 'index'])->name('filter.index');
Route::post('filter-data', [DataController::class, 'filterData'])->name('filter.data');
