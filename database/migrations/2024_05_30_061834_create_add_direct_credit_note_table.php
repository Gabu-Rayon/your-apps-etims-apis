<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddDirectCreditNoteTable extends Migration
{
    public function up()
    {
        Schema::create('direct_credit_notes', function (Blueprint $table) {
            $table->id();
            $table->string('orgInvoiceNo');
            $table->string('traderInvoiceNo');
            $table->string('salesType');
            $table->string('paymentType');
            $table->date('creditNoteDate');
            $table->date('confirmDate');
            $table->date('salesDate');
            $table->date('stockReleseDate');
            $table->date('receiptPublishDate');
            $table->date('occurredDate');
            $table->string('creditNoteReason');
            $table->string('invoiceStatusCode')->nullable();
            $table->boolean('isPurchaseAccept');
            $table->text('remark')->nullable();
            $table->boolean('isStockIOUpdate');
            $table->string('mapping')->nullable(); // Allow NULL values
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('direct_credit_notes');
    }
}