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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mitra');
            $table->string('penanggung_jawab');
            $table->string('email')->unique();
            $table->string('nomor_telepon', 20);
            $table->text('alamat_lengkap');
            $table->enum('status_verifikasi', ['Menunggu', 'Terverifikasi', 'Ditolak'])->default('Menunggu');
            $table->text('dokumen_verifikasi')->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
