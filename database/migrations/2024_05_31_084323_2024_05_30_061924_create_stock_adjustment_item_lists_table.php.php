<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('stock_adjustment_item_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_adjustment_id');
            $table->string('itemCode');
            $table->integer('packageQuantity');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('stock_adjustment_id')->references('id')->on('stock_adjustments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_adjustment_item_lists');
    }
};