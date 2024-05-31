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
        Schema::create('update_stock_io_data_item_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('update_stock_io_data_id');
            $table->string('itemCode');
            $table->integer('packageQuantity');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('update_stock_io_data_id')->references('id')->on('update_stock_io_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};