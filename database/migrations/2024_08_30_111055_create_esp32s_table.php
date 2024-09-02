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
        Schema::create('esp32s', function (Blueprint $table) {
            $table->id();
            $table->char('sensor',30);
            $table->char('location',30);
            $table->char('value1',10);
            $table->char('value2',10);
            $table->char('value3',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esp32s');
    }
};
