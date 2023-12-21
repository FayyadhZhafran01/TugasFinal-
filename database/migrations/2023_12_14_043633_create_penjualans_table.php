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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penjualan');
            $table->unsignedInteger('tipe_id'); //relasi field dari tabel tipe
            $table->unsignedInteger('pemilik_id'); //relasi field dari tabel penjual
            $table->unsignedInteger('pembeli_id'); //relasi field dari tabel pembeli
            $table->string('jumlah_jual');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
