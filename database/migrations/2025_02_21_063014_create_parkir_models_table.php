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
        Schema::create('parkir_models', function (Blueprint $table) {
            $table->id();
            $table->string('foto_kendaraan')->nullable();
            $table->string('foto_pemilik')->nullable();
            $table->string('jenis_kendaraan');
            $table->string('nama_pemilik');
            $table->string('plat_nomor');
            $table->string('warna_kendaraan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkir_models');
    }
};
