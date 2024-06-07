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
        Schema::create('add_sale_credit_note_items_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('add_sale_credit_note_id');
            $table->string('itemCode');
            $table->string('itemClassCode');
            $table->string('itemTypeCode');
            $table->string('itemName');
            $table->string('orgnNatCd');
            $table->string('taxTypeCode');
            $table->decimal('unitPrice');
            $table->string('isrcAplcbYn');
            $table->string('pkgUnitCode');
            $table->decimal('pkgQuantity');
            $table->string('qtyUnitCd');
            $table->decimal('quantity');
            $table->decimal('discountRate');
            $table->decimal('discountAmt');
            $table->string('itemExprDate');
            $table->timestamps();

            $table->foreign('add_sale_credit_note_id')->references('id')->on('add_sale_credit_notes')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_sale_credit_note_item_list');
    }
};