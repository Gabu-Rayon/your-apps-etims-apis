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
        Schema::create('purchase_lists_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_list_id');
            $table->foreign('purchase_list_id')->references('id')->on('purchase_lists')->onDelete('cascade');
            $table->string('itemSeq');
            $table->string('itemCd');
            $table->string('itemClsCd');
            $table->string('itemNm');
            $table->string('bcd');
            $table->string('spplrItemClsCd');
            $table->string('spplrItemCd');
            $table->string('spplrItemNm');            
            $table->string('pkgUnitCd');
            $table->integer('pkg');
            $table->string('qtyUnitCd');
            $table->integer('qty');
            $table->double('prc');
            $table->double('splyAmt');
            $table->double('dcRt');
            $table->double('dcAmt');
            $table->string('taxTyCd');
            $table->double('taxblAmt');
            $table->double('taxAmt');
            $table->double('totAmt');
            $table->timestamp('itemExprDt')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_lists_items');
    }
};