<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('personils', function (Blueprint $table) {
            $table->string('nip', 20)->primary();
            $table->string('nama_personil', 50);
            $table->string('jabatan', 30)->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personils');
    }
};
