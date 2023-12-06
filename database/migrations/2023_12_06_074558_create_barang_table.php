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
Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('merk', 50)->nullable();
            $table->string('seri', 50)->nullable();
            $table->text('spesifikasi')->nullable();
            $table->smallInteger('stok');
            $table->foreignId('kategori_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
