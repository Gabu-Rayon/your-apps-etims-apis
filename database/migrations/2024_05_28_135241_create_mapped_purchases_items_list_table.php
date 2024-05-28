<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mapped_purchases_items_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mapped_purchase_id')->constrained('mapped_purchases')->onDelete('cascade');
            $table->string('supplierItemCode');
            $table->string('itemCode');
            $table->integer('mapQuantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapped_purchases_items_list');
    }
};