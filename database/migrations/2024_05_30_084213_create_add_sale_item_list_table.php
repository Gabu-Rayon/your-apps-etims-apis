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
        Schema::create('add_sale_item_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('add_sale_id');
            $table->foreign('add_sale_id')->references('id')->on('add_sales')->onDelete('cascade');
            $table->string('itemCode');
            $table->string('itemClassCode');
            $table->string('itemTypeCode');
            $table->string('itemName');
            $table->string('orgnNatCd');
            $table->string('taxTypeCode');
            $table->decimal('unitPrice', 10, 2);
            $table->string('isrcAplcbYn');
            $table->string('pkgUnitCode');
            $table->decimal('pkgQuantity', 10, 2);
            $table->string('qtyUnitCd');
            $table->decimal('quantity', 10, 2);
            $table->decimal('discountRate', 10, 2);
            $table->decimal('discountAmt', 10, 2);
            $table->string('itemExprDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_sale_item_list');
    }
};