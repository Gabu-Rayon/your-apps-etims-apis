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
        Schema::create('item_opening_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('itemCode');
            $table->decimal('quantity', 10, 2);
            $table->decimal('packageQuantity', 10, 2);

            $table->foreign('itemCode')->references('itemCode')->on('items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_opening_stocks');
    }
};
