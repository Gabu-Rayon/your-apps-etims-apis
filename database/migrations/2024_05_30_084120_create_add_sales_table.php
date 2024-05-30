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
        Schema::create('add_sales', function (Blueprint $table) {
            $table->id();
            $table->string('customerNo');
            $table->string('customerTin');
            $table->string('customerName');
            $table->string('customerMobileNo');
            $table->string('salesType');
            $table->string('paymentType');
            $table->string('traderInvoiceNo');
            $table->string('confirmDate');
            $table->string('salesDate');
            $table->string('stockReleseDate');
            $table->string('receiptPublishDate');
            $table->string('occurredDate');
            $table->string('invoiceStatusCode');
            $table->string('remark');
            $table->boolean('isPurchaseAccept');
            $table->boolean('isStockIOUpdate');
            $table->string('mapping');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_sales');
    }
};