<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' =>'admin', 'middleware' => ['auth']], function ()
{
    Route::resource('pengguna', UserController::class);
    Route::resource('jabatan',JabatanController::class);
    Route::resource('lokasi',LokasiController::class);
    Route::get( 'get-jabatan',[JabatanController::class, 'getJabatan'])->name('get.jabatan');
    Route::get( 'get-lokasi',[LokasiController::class, 'getLokasi'])->name('get.lokasi');
    Route::get('print-pdf',[JabatanController::class, 'printPdf'])->name('print.jabatan');
    Route::get('grafik-jabatan',[JabatanController::class, 'grafikJabatan'])->name('grafik.jabatan');
    Route::get('get-grafik',[JabatanController::class, 'getGrafik'])->name('get.grafik.jabatan');
    Route::get('export-excel',[JabatanController::class, 'exportExcel'])->name('export.excel');
    Route::get('print-pdflokasi',[LokasiController::class, 'printPdflokasi'])->name('print.lokasi');
    Route::get('grafik-lokasi',[LokasiController::class, 'grafikLokasi'])->name('grafik.lokasi');
    Route::get('get-grafiklokasi',[LokasiController::class, 'getGrafikLokasi'])->name('get.grafik.lokasi');
    Route::get('export-excelLokasi',[LokasiController::class, 'exportExcelLokasi'])->name('export.excel.lokasi');
});

