<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\LaporanHasilController;
use App\Http\Controllers\LiteraturController;

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

// Laporan Hasil
Route::resource('laporan', LaporanHasilController::class);

// Literatur
Route::resource('literatur', LiteraturController::class);
