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
        Schema::create('cuti_balances', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->integer('total_days')->default(12);
            $table->integer('remaining_days')->default(12);
            $table->timestamps();

            $table->foreignUuid('employee_id')->constrained('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti_balances');
    }
};
