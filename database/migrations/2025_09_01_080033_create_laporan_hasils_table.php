<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_hasils', function (Blueprint $table) {
    $table->id('id_laporan');
    $table->string('judul', 150);
    $table->text('isi_laporan');
    $table->string('dibuat_oleh', 100);
    $table->date('tanggal_laporan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_hasils');
    }
};
