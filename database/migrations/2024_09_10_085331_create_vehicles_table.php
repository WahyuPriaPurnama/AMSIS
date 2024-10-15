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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kendaraan');
            $table->string('kategori');
            $table->foreignId('subsidiary_id')->constrained()->onDelete('cascade');
            $table->date('tgl_perolehan');
            $table->string('pengguna');
            $table->string('nama_warna');
            $table->string('warna');
            $table->string('tahun');
            $table->string('atas_nama');
            $table->string('nopol')->unique();
            $table->string('no_rangka')->unique()->nullable();
            $table->string('no_bpkb')->unique()->nullable();
            $table->string('no_mesin')->unique()->nullable();
            $table->date('stnk')->nullable();
            $table->date('pajak')->nullable();
            $table->date('kir')->nullable();
            $table->string('j_asuransi')->nullable();
            $table->string('p_asuransi')->nullable();
            $table->string('no_asuransi')->nullable();
            $table->date('jth_tempo')->nullable();
            $table->string('kondisi');
            $table->text('keterangan')->nullable();
            //lampiran
            $table->string('foto')->nullable();
            $table->string('f_stnk')->nullable();
            $table->string('f_pajak')->nullable();
            $table->string('f_kir')->nullable();
            $table->string('qr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
