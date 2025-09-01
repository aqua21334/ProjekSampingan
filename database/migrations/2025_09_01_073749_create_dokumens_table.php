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
        Schema::create('dokumens', function (Blueprint $table) {
    $table->id('id_dokumen');               // PK dokumen
    $table->string('jenis_dokumen', 50);    // misalnya: SOP, Laporan, Manual
    $table->string('judul', 150);           // judul dokumen yang tampil
    $table->string('file_url');             // simpan link Google Drive (sharing link/preview link)
    $table->string('upload_by', 50)->nullable(); // opsional, siapa yang upload
    $table->timestamps();                   // created_at & updated_at
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
