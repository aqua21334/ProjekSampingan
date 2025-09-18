<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\LaporanHasilController;
use App\Http\Controllers\LiteraturController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PnpbController;

// Personil
Route::resource('personil', PersonilController::class)->parameters([
    'personil' => 'nip'
]);

// Peralatan
Route::resource('peralatan', PeralatanController::class)->parameters([
    'peralatan' => 'kode_bmn'
]);

// SOP
Route::resource('sop', SopController::class)->parameters([
    'sop' => 'kode_sop'
]);

// Permintaan
Route::resource('permintaan', PermintaanController::class);

// Dokumen
Route::resource('dokumen', App\Http\Controllers\DokumenController::class);

// Laporan Hasil
Route::resource('laporan_hasil', LaporanHasilController::class);
// PNBP
Route::resource('pnpb', PnpbController::class);

// Alias for sidebar navigation
Route::get('laporan', [LaporanHasilController::class, 'index'])->name('laporan.index');

// Literatur
Route::resource('literatur', LiteraturController::class);

// Dashboard
use App\Models\Personil;
use App\Models\Peralatan;
use App\Models\Sop;
use App\Models\LaporanHasil;

Route::get('/dashboard', function () {
    $personilCount = Personil::count();
    $peralatanCount = Peralatan::count();
    $sopCount = Sop::count();
    $laporanCount = LaporanHasil::count();
    $pnpbCount = \App\Models\Pnpb::count();
    $permintaanAll = \App\Models\Permintaan::all();
    $permintaanList = $permintaanAll->whereIn('status', ['pending', 'proses']);

    // Statistik kalibrasi peralatan
    $peralatanSudah = Peralatan::where('status_kalibrasi', 'Sudah')->count();
    $peralatanBelum = Peralatan::where('status_kalibrasi', 'Belum')->count();

    return view('dashboard', compact(
        'personilCount',
        'peralatanCount',
        'sopCount',
        'laporanCount',
        'pnpbCount',
        'permintaanList',
        'permintaanAll',
        'peralatanSudah',
        'peralatanBelum',
    ));
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Home
Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';