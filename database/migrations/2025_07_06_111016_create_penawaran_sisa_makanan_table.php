<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penawaran_sisa_makanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->integer('kuantitas');
            $table->string('satuan', 50);
            $table->date('tanggal_penawaran');
            $table->dateTime('waktu_kadaluarsa');
            $table->enum('status', ['Tersedia', 'Sudah Dialokasikan', 'Tersalurkan'])->default('Tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penawaran_sisa_makanan');
    }
};
