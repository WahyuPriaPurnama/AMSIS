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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->char('nip', 16)->unique();
            $table->char('nama', 25);
            $table->char('nik', 16)->unique();
            $table->char('perusahaan', 30);
            $table->char('divisi', 20);
            $table->char('departemen', 20);
            $table->char('seksi', 20);
            $table->char('posisi', 20);
            $table->char('status_peg', 8);
            $table->date('tgl_masuk');
            $table->date('awal_kontrak');
            $table->date('akhir_kontrak');
            $table->char('tmpt_lahir',20);
            $table->date('tgl_lahir');
            $table->char('jenis_kelamin', 1);
            $table->text('alamat');
            $table->char('no_telp', 12);
            $table->string('email');
            $table->char('pend_trkhr', 10);
            $table->char('jurusan', 25);
            $table->char('thn_lulus', 4);
            $table->char('nama_ibu', 25);
            $table->char('npwp', 16);
            $table->char('status', 2);
            $table->char('jml_ank', 2)->nullable();
            $table->char('nama_kd', 25);
            $table->char('no_kd', 12);
            $table->char('hubungan', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
