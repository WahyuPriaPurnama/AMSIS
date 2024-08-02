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
            $table->string('nama');
            $table->char('nik', 16)->unique();
            $table->char('divisi', 20);
            $table->char('departemen', 20);
            $table->char('seksi', 20);
            $table->char('posisi', 20);
            $table->char('status_peg', 8);
            $table->date('tgl_masuk');
            $table->date('awal_kontrak')->nullable();
            $table->date('akhir_kontrak')->nullable();
            $table->string('tmpt_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->char('jenis_kelamin', 1)->nullable();
            $table->text('alamat')->nullable();
            $table->char('no_telp', 12)->nullable();
            $table->string('email')->nullable();
            $table->char('pend_trkhr', 10)->nullable();
            $table->char('jurusan', 25)->nullable();
            $table->char('thn_lulus', 4)->nullable();
            $table->string('nama_ibu')->nullable();
            $table->char('npwp', 31)->nullable();
            $table->char('status', 11)->nullable();
            $table->char('jml_ank', 2)->nullable();
            $table->string('nama_kd')->nullable();
            $table->char('no_kd', 12)->nullable();
            $table->char('hubungan', 15)->nullable();
            $table->string('pp')->nullable();
            $table->foreignId('subsidiary_id')->constrained()->onDelete('cascade');
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('npwp2')->nullable();
            $table->string('bpjs_ket')->nullable();
            $table->string('bpjs_kes')->nullable();
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
