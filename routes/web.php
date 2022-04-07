<?php

use App\Http\Controllers\BlashController;
use App\Imports\MahasiswaImport;
use App\Models\Kemahasiswaan;
use App\Models\Mahasiswa;
use App\Models\Rekening;
use App\Models\Template;
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
})->name('dashboard');
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
