<?php

use App\Http\Controllers\BlashController;
use App\Http\Controllers\BlashMarketing50;
use App\Http\Controllers\BlashWb2c;
use App\Http\Controllers\EnrichmentController;
use App\Http\Controllers\ReaktifController;
use App\Imports\EnrichmentIImport;
use App\Imports\EnrichmentImport;
use App\Imports\MahasiswaImport;
use App\Imports\ReaktifImport;
use App\Models\enrichment;
use App\Models\Kemahasiswaan;
use App\Models\Mahasiswa;
use App\Models\reaktif;
use App\Models\Rekening;
use App\Models\Template;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $mahasiswa = Mahasiswa::all();
    $rekening = Rekening::all();
    $kemahasiswaan = Kemahasiswaan::all();
    $template = Template::all();
    return view('dashboard', ['mahasiswa' => $mahasiswa, 'rekening' => $rekening, 'kemahasiswaan' => $kemahasiswaan, 'template' => $template]);
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard', function () {
    Excel::import(new MahasiswaImport, request()->file('file'));
    return back();
})->name('dashboardd');
Route::middleware(['auth:sanctum', 'verified'])->post('/blash', [BlashController::class, 'send_mail']);
Route::middleware(['auth:sanctum', 'verified'])->post('/clear', [BlashController::class, 'clear']);
Route::middleware(['auth:sanctum', 'verified'])->get('/history', function () {
    $mahasiswa = Mahasiswa::onlyTrashed()->get();
    return view('history', ['mahasiswa' => $mahasiswa]);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/pdf', function () {
    $data = Mahasiswa::with('surat')
        ->find(4);
    return view('pdf_piutang', ['data' => $data]);
});
//Reaktif
Route::middleware(['auth:sanctum', 'verified'])->get('/download_reaktif', function () {
    $filePath = public_path("/assets/excel/import.xlsx");
    return Response::download($filePath);
})->name('download_reaktif');
Route::middleware(['auth:sanctum', 'verified'])->post('/reaktif_clear', [ReaktifController::class, 'clear']);
Route::middleware(['auth:sanctum', 'verified'])->get('/reaktif', function () {
    $mahasiswa = reaktif::all();
    $rekening = Rekening::all();
    $kemahasiswaan = Kemahasiswaan::all();
    $template = Template::all();
    return view('reaktif/dashboard', ['mahasiswa' => $mahasiswa, 'rekening' => $rekening, 'kemahasiswaan' => $kemahasiswaan, 'template' => $template]);
})->name('reaktif');
Route::middleware(['auth:sanctum', 'verified'])->post('/import_reaktif', function () {
    Excel::import(new ReaktifImport, request()->file('file'));
    return back();
})->name('import_reaktif');
Route::middleware(['auth:sanctum', 'verified'])->get('/reak_history', function () {
    $mahasiswa = reaktif::onlyTrashed()->get();
    return view('reaktif/history', ['mahasiswa' => $mahasiswa]);
})->name('reak_history');
Route::middleware(['auth:sanctum', 'verified'])->post('/BlashReaktif', [ReaktifController::class, 'send_mail']);
Route::middleware(['auth:sanctum', 'verified'])->get('/cek_reaktif', [ReaktifController::class, 'cetak_pdf']);
//Enrichment
Route::middleware(['auth:sanctum', 'verified'])->get('/download_enrichment', function () {
    $filePath = public_path("/assets/excel/EnrichmentImport.xlsx");
    return Response::download($filePath);
})->name('download_enrichment');
Route::middleware(['auth:sanctum', 'verified'])->post('/import_enrichment', function () {
    Excel::import(new EnrichmentImport, request()->file('file'));
    return back();
})->name('import_enrichment');
Route::middleware(['auth:sanctum', 'verified'])->post('/enrichment_clear', [EnrichmentController::class, 'clear']);
Route::middleware(['auth:sanctum', 'verified'])->get('/enrichment', function () {
    $mahasiswa = enrichment::all();
    $template = Template::all();
    return view('enrichment/dashboard', ['mahasiswa' => $mahasiswa, 'template' => $template]);
})->name('enrichment');
Route::middleware(['auth:sanctum', 'verified'])->get('/enrichment_history', function () {
    $mahasiswa = enrichment::onlyTrashed()->get();
    return view('enrichment/history', ['mahasiswa' => $mahasiswa]);
})->name('enrichment_history');
Route::middleware(['auth:sanctum', 'verified'])->post('/BlashEnrichment', [EnrichmentController::class, 'send_mail']);
Route::middleware(['auth:sanctum', 'verified'])->get('/cek_enrichment', [EnrichmentController::class, 'cetak_pdf']);
Route::middleware(['auth:sanctum', 'verified'])->get('/w2bc', [BlashWb2c::class, 'send_mail']);
//marketing50
Route::middleware(['auth:sanctum', 'verified'])->get('/marketing50', [BlashMarketing50::class, 'send_mail']);
Route::middleware(['auth:sanctum', 'verified'])->get('/rendermarketing50', [BlashMarketing50::class, 'cetak_pdf']);
