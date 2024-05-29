<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mapped_purchases_items_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mapped_purchase_id')->constrained('mapped_purchases')->onDelete('cascade');
            $table->integer('itemSeq');
            $table->string('itemCd');
            $table->string('itemClsCd');
            $table->string('itemNmme');
            $table->string('bcd')->nullable();
            $table->string('supplrItemClsCd')->nullable();
            $table->string('supplrItemCd')->nullable();
            $table->string('supplrItemNm')->nullable();
            $table->string('pkgUnitCd');
            $table->decimal('pkg', 15, 8);
            $table->string('qtyUnitCd');
            $table->decimal('qty', 15, 8);
            $table->decimal('unitprice', 15, 8);
            $table->decimal('supplyAmt', 15, 8);
            $table->decimal('discountRate', 15, 8);
            $table->decimal('discountAmt', 15, 8);
            $table->decimal('taxblAmt', 15, 8);
            $table->string('taxTyCd');
            $table->decimal('taxAmt', 15, 8);
            $table->decimal('totAmt', 15, 8);
            $table->string('itemExprDt')->nullable();
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