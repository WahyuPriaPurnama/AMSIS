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
        Schema::create('harians', function (Blueprint $table) {
            $table->id();
            $table->string('pin')->unique();
            $table->string('nip')->nullable();
            $table->string('nama');
            $table->string('jadwal_kerja')->nullable();
            $table->string('departemen')->nullable();
            $table->string('bagian')->nullable();
            $table->string('no_telp',15)->nullable();
            $table->decimal('gaji', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harians');
    }
};
