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
        Schema::create('master_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier')->unique();
            $table->string('jenis_supplier');
            $table->string('kontak');
            $table->text('alamat');
            $table->string('email')->nullable();
            $table->string('up')->nullable();
            $table->string('pembayaran');
            $table->integer('hari')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_suppliers');
    }
};
