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
        Schema::create('mapped_purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('invcNo');
            $table->integer('orgInvcNo');
            $table->string('supplrTin');
            $table->string('supplrBhfId');
            $table->string('supplrName')->nullable();
            $table->string('supplrInvcNo');
            $table->string('purchaseTypeCode');
            $table->string('rceiptTyCd');
            $table->string('paymentTypeCode');
            $table->string('purchaseSttsCd');
            $table->date('confirmDate')->nullable();
            $table->date('purchaseDate');
            $table->timestamp('warehouseDt');
            $table->date('cnclReqDt')->nullable();
            $table->date('cnclDt')->nullable();
            $table->date('refundDate')->nullable();
            $table->integer('totItemCnt');
            $table->decimal('taxblAmtA', 15, 8);
            $table->decimal('taxblAmtB', 15, 8);
            $table->decimal('taxblAmtC', 15, 8);
            $table->decimal('taxblAmtD', 15, 8);
            $table->decimal('taxRtA', 5, 2);
            $table->decimal('taxRtB', 5, 2);
            $table->decimal('taxRtC', 5, 2);
            $table->decimal('taxRtD', 5, 2);
            $table->decimal('taxAmtA', 15, 8);
            $table->decimal('taxAmtB', 15, 8);
            $table->decimal('taxAmtC', 15, 8);
            $table->decimal('taxAmtD', 15, 8);
            $table->decimal('totTaxblAmt', 15, 8);
            $table->decimal('totTaxAmt', 15, 8);
            $table->decimal('totAmt', 15, 8);
            $table->string('remark')->nullable();
            $table->datetime('resultDt')->nullable();
            $table->datetime('createdDate');
            $table->boolean('isUpload');
            $table->boolean('isStockIOUpdate');
            $table->boolean('isClientStockUpdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapped_purchases');
    }
};