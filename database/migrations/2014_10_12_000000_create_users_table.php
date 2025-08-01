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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['super-admin', 'holding-admin', 'eln-admin', 'eln2-admin', 'bofi-admin', 'haka-admin', 'rmm-admin','employee'])->default('employee');
            $table->foreignUuid('employee_id')->nullable()->constrained('employees')->OnDelete('cascade');
            $table->foreignId('subsidiary_id')->nullable()->constrained('subsidiaries')->OnDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
