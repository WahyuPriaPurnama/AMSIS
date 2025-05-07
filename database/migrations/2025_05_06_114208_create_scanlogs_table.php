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
        Schema::create('scanlogs', function (Blueprint $table) {
            $table->id();
            $table->integer('pin');
            $table->string('nip');
            $table->string('nama');
            $table->string('departement');
            $table->string('bagian');
            $table->string('upah');
            $table->date('tanggal');
            $table->time('scan_1');
            $table->time('scan_2');
            $table->time('scan_3');
            $table->time('scan_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scanlogs');
    }
};
