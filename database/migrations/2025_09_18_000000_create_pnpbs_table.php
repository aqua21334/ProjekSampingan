<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pnpbs', function (Blueprint $table) {
            $table->string('kode_billing', 50)->primary();
            $table->string('pelanggan', 255);
            $table->decimal('rupiah', 15, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pnpbs');
    }
};
