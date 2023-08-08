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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('foto_produk');
            $table->integer('harga');
            $table->integer('stok');
            $table->text('deskripsi');
            $table->foreignId('kategori_id')->unsigned();
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategori_produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
