<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peralatans', function (Blueprint $table) {
            $table->string('kode_bmn', 30)->primary();
            $table->string('nama_peralatan', 50);
            $table->date('tanggal_kalibrasi')->nullable();
            $table->enum('status_kalibrasi', ['Sudah', 'Belum'])->default('Belum');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peralatans');
    }
};