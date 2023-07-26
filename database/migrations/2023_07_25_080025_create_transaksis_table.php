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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned();
            $table->foreignId('produk_id')->unsigned();
            $table->integer('harga');
            $table->integer('qty');
            $table->text('deskripsi');
            $table->integer('diskon')->nullable();
            $table->integer('subtotal');
            $table->integer('potongan')->default(0);
            $table->integer('total');
            $table->enum('status_pembayaran',['Belum Dibayar','Sudah Dibayar'])->default('Belum Dibayar');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produk_id')->references('id')->on('produks');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
