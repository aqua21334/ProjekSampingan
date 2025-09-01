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
        Schema::create('permintaans', function (Blueprint $table) {
    $table->id('id_permintaan');
    $table->string('pemohon', 100); // nama/unit yang meminta
    $table->string('jenis_permintaan', 100); // jenis layanan/dokumen yg diminta
    $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending');
    $table->text('keterangan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaans');
    }
};
