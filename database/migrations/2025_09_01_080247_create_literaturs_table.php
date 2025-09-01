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
      Schema::create('literaturs', function (Blueprint $table) {
    $table->id('id_literatur');
    $table->string('judul', 200);
    $table->string('penulis', 150)->nullable();
    $table->string('tahun', 4)->nullable();
    $table->string('penerbit', 150)->nullable();
    $table->string('sni_number', 100)->nullable(); // nomor standar SNI
    $table->string('link', 255)->nullable(); // bisa untuk DOI, link online, atau link ke PDF
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('literaturs');
    }
};
