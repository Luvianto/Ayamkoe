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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPembayaran');
            $table->foreign('idPembayaran')->references('id')->on('pembayarans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('idProduk');
            $table->foreign('idProduk')->references('id')->on('produks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
