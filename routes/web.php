
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\LaporanHasilController;
use App\Http\Controllers\LiteraturController;
use App\Http\Controllers\ProfileController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

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

// Literatur
Route::resource('literatur', LiteraturController::class);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');