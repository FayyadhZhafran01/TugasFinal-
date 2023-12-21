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
        Schema::create('total_transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->unsignedInteger('penjualan_id'); //relasi dari tabel penjualan
            $table->string('jumlah');
            $table->string('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_transaksis');
    }
};
