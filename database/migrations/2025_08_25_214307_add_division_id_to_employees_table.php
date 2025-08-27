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
        Schema::table('employees', function (Blueprint $table) {
            $table->foreignId('division_id')->nullable()->after('divisi');
            $table->foreignId('department_id')->nullable()->after('departemen');
            $table->foreignId('section_id')->nullable()->after('seksi');
            $table->foreignId('position_id')->nullable()->after('posisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('division_id');
            $table->dropColumn('department_id');
            $table->dropColumn('section_id');
            $table->dropColumn('position_id');
        });
    }
};
