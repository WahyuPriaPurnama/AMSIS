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
        Schema::create('master_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subsidiary_id')->constrained();
            $table->string('nama_barang');
            $table->string('kategori');
            $table->integer('periode');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->foreignId('master_supplier_id')->constrained()->cascadeOnDelete();
            $table->date('tgl_pembelian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_barangs');
    }
};
