<?php

use App\Http\Controllers\BlashController;
use App\Http\Controllers\BlashMarketing50;
use App\Http\Controllers\BlashWb2c;
use App\Http\Controllers\EnrichmentController;
use App\Http\Controllers\hasilautodebetController;
use App\Http\Controllers\InfoautodebetController;
use App\Http\Controllers\OutlookInvController;
use App\Http\Controllers\ReaktifController;
use App\Http\Controllers\reminderKrs3Controller;
use App\Http\Controllers\reminderPembayaranController;
use App\Http\Controllers\ReminKrsTahap12Controller;
use App\Imports\EnrichmentIImport;
use App\Imports\EnrichmentImport;
use App\Imports\hasilautodebetImport;
use App\Imports\infoautodebetImport;
use App\Imports\MahasiswaImport;
use App\Imports\ReaktifImport;
use App\Imports\reminderKrs12mport;
use App\Imports\reminderKrs3mport;
use App\Imports\reminderPembayaranImport;
use App\Models\autodebet;
use App\Models\enrichment;
use App\Models\Kemahasiswaan;
use App\Models\Mahasiswa;
use App\Models\reaktif;
use App\Models\Rekening;
use App\Models\reminderKrs12;
use App\Models\reminderKrs3;
use App\Models\reminderPembayaran;
use App\Models\Template;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
//user change
Route::middleware(['auth:sanctum', 'verified'])->get('/user', function () {
    $user = User::where('id', Auth::user()->id)->first();
    return view('user', ['user' => $user]);
})->name('user');
//end user
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
//infoautodebet
Route::middleware(['auth:sanctum', 'verified'])->get('/download_infoautodebet', function () {
    $filePath = public_path("/assets/excel/InfoautodebetImport.xlsx");
    return Response::download($filePath);
})->name('download_infoautodebet');
Route::middleware(['auth:sanctum', 'verified'])->post('/import_infoautodebet', function () {
    Excel::import(new infoautodebetImport, request()->file('file'));
    return back();
})->name('import_infoautodebet');
Route::middleware(['auth:sanctum', 'verified'])->post('/infoautodebet_clear', [InfoautodebetController::class, 'clear']);
Route::middleware(['auth:sanctum', 'verified'])->get('/infoautodebet', function () {
    $mahasiswa = autodebet::where('type', 'infoautodebet')->get();
    $template = Template::all();
    return view('infoautodebet/dashboard', ['mahasiswa' => $mahasiswa, 'template' => $template]);
})->name('infoautodebet');
Route::middleware(['auth:sanctum', 'verified'])->get('/infoautodebet_history', function () {
    $mahasiswa = autodebet::onlyTrashed()->where('type', 'infoautodebet')->get();
    return view('infoautodebet/history', ['mahasiswa' => $mahasiswa]);
})->name('infoautodebet_history');
Route::middleware(['auth:sanctum', 'verified'])->post('/Blashinfoautodebet', [infoautodebetController::class, 'send_mail']);
Route::middleware(['auth:sanctum', 'verified'])->get('/cek_infoautodebet', [infoautodebetController::class, 'cetak_pdf']);
//hasilAutodebet
Route::middleware(['auth:sanctum', 'verified'])->get('/download_hasilautodebet', function () {
    $filePath = public_path("/assets/excel/HasilautodebetImport.xlsx");
    return Response::download($filePath);
})->name('download_hasilautodebet');
Route::middleware(['auth:sanctum', 'verified'])->post('/import_hasilautodebet', function () {
    Excel::import(new hasilautodebetImport, request()->file('file'));
    return back();
})->name('import_hasilautodebet');
Route::middleware(['auth:sanctum', 'verified'])->post('/hasilautodebet_clear', [hasilautodebetController::class, 'clear']);
Route::middleware(['auth:sanctum', 'verified'])->get('/hasilautodebet', function () {
    $mahasiswa = autodebet::where('type', 'hasilautodebet')->get();
    $template = Template::all();
    return view('hasilautodebet/dashboard', ['mahasiswa' => $mahasiswa, 'template' => $template]);
})->name('hasilautodebet');
Route::middleware(['auth:sanctum', 'verified'])->get('/hasilautodebet_history', function () {
    $mahasiswa = autodebet::onlyTrashed()->where('type', 'hasilautodebet')->get();
    return view('hasilautodebet/history', ['mahasiswa' => $mahasiswa]);
})->name('hasilautodebet_history');
Route::middleware(['auth:sanctum', 'verified'])->post('/Blashhasilautodebet', [hasilautodebetController::class, 'send_mail']);
//reminderPembayaran
Route::middleware(['auth:sanctum', 'verified'])->get('/download_reminderPembayaran', function () {
    $filePath = public_path("/assets/excel/reminderPembayaranImport.xlsx");
    return Response::download($filePath);
})->name('download_reminderPembayaran');
Route::middleware(['auth:sanctum', 'verified'])->post('/import_reminderPembayaran', function () {
    Excel::import(new reminderPembayaranImport, request()->file('file'));
    return back();
})->name('import_reminderPembayaran');
Route::middleware(['auth:sanctum', 'verified'])->post('/reminderPembayaran_clear', [reminderPembayaranController::class, 'clear']);
Route::middleware(['auth:sanctum', 'verified'])->get('/reminderPembayaran', function () {
    $mahasiswa = reminderPembayaran::all();
    $template = Template::all();
    return view('reminderPembayaran/dashboard', ['mahasiswa' => $mahasiswa, 'template' => $template]);
})->name('reminderPembayaran');
Route::middleware(['auth:sanctum', 'verified'])->get('/reminderPembayaran_history', function () {
    $mahasiswa = reminderPembayaran::onlyTrashed()->get();
    return view('reminderPembayaran/history', ['mahasiswa' => $mahasiswa]);
})->name('reminderPembayaran_history');
Route::middleware(['auth:sanctum', 'verified'])->post('/BlashreminderPembayaran', [reminderPembayaranController::class, 'send_mail']);
//ReminderKrsTahap12
Route::middleware(['auth:sanctum', 'verified'])->get('/reminderKrs12', function () {
    $mahasiswa = reminderKrs12::all();
    $template = Template::all();
    return view('reminderKrs12/dashboard', ['mahasiswa' => $mahasiswa, 'template' => $template]);
})->name('reminderKrs12');
Route::middleware(['auth:sanctum', 'verified'])->get('/reminderKrs12_history', function () {
    $mahasiswa = reminderKrs12::onlyTrashed()->get();
    return view('reminderKrs12/history', ['mahasiswa' => $mahasiswa]);
})->name('reminderKrs12_history');
Route::middleware(['auth:sanctum', 'verified'])->get('/download_reminderKrs12', function () {
    $filePath = public_path("/assets/excel/reminderKrs12Import.xlsx");
    return Response::download($filePath);
})->name('download_ReminderKrs12');
Route::middleware(['auth:sanctum', 'verified'])->post('/import_ReminderKrs12', function () {
    Excel::import(new reminderKrs12mport, request()->file('file'));
    return back();
})->name('import_ReminderKrs12');
Route::middleware(['auth:sanctum', 'verified'])->post('/reminderKrs12_clear', [ReminKrsTahap12Controller::class, 'clear']);
Route::middleware(['auth:sanctum', 'verified'])->post('/BlashreminderKrs12', [ReminKrsTahap12Controller::class, 'send_mail']);
//reminderKrs3
Route::middleware(['auth:sanctum', 'verified'])->get('/reminderKrs3', function () {
    $mahasiswa = reminderKrs3::all();
    $template = Template::all();
    return view('reminderKrs3/dashboard', ['mahasiswa' => $mahasiswa, 'template' => $template]);
})->name('reminderKrs3');
Route::middleware(['auth:sanctum', 'verified'])->get('/reminderKrs3_history', function () {
    $mahasiswa = reminderKrs3::onlyTrashed()->get();
    return view('reminderKrs3/history', ['mahasiswa' => $mahasiswa]);
})->name('reminderKrs3_history');
Route::middleware(['auth:sanctum', 'verified'])->get('/download_reminderKrs3', function () {
    $filePath = public_path("/assets/excel/reminderKrs3Import.xlsx");
    return Response::download($filePath);
})->name('download_reminderKrs3');
Route::middleware(['auth:sanctum', 'verified'])->post('/import_reminderKrs3', function () {
    Excel::import(new reminderKrs3mport, request()->file('file'));
    return back();
})->name('import_reminderKrs3');
Route::middleware(['auth:sanctum', 'verified'])->post('/reminderKrs3_clear', [reminderKrs3Controller::class, 'clear']);
Route::middleware(['auth:sanctum', 'verified'])->post('/BlashreminderKrs3', [reminderKrs3Controller::class, 'send_mail']);
//marketing50
Route::middleware(['auth:sanctum', 'verified'])->get('/w2bc', [BlashWb2c::class, 'send_mail']);
Route::middleware(['auth:sanctum', 'verified'])->get('/renderw2bc', [BlashWb2c::class, 'cetak_pdf']);
