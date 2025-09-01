<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sops', function (Blueprint $table) {
            $table->string('kode_sop', 30)->primary();
            $table->string('nama_sop', 100);
            $table->text('deskripsi_sop')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sops');
    }
};
