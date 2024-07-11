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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('supplier');
            $table->text('address');
            $table->integer('phone');
            $table->string('number');
            $table->date('date');
            $table->string('npwp');
            $table->string('items');
            $table->string('unit');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total_price');
            $table->text('top');
            $table->integer('grand_price');
            $table->integer('discount');
            $table->integer('ppn');
            $table->integer('grand_total');
            $table->date('delivery_date');
            $table->text('shipping_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
