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
            $table->date('tgl');
            $table->string('jadwal');
            $table->string('jk');
            $table->integer('pin');
            $table->string('nip');
            $table->string('nama');
            $table->string('dept');
            $table->string('bagian');
            $table->string('upah');
            $table->time('jm');
            $table->time('sm');
            $table->time('jp');
            $table->time('sp');
            $table->decimal('dk', 5, 2)->nullable();
            $table->integer('status')->default(0);
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
