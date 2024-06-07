<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetSalesByTraderInvoiceNoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_sales_by_trader_invoice_no', function (Blueprint $table) {
            $table->id();
            $table->string('trderInvoiceNo');
            $table->unsignedBigInteger('invoiceNo');
            $table->unsignedBigInteger('orgInvoiceNo')->default(0);
            $table->string('customerTin');
            $table->string('customerName');
            $table->string('receptTypeCode');
            $table->string('paymentTypeCode');
            $table->string('salesSttsCode');
            $table->string('confirmDate');
            $table->string('salesDate');
            $table->string('stockReleaseDate');
            $table->string('cancelReqDate')->nullable();
            $table->string('cancelDate')->nullable();
            $table->string('refundDate')->nullable();
            $table->string('refundReasonCd')->nullable();
            $table->unsignedInteger('totalItemCnt');
            $table->decimal('taxableAmtA', 12, 2)->default(0);
            $table->decimal('taxableAmtB', 12, 2)->default(0);
            $table->decimal('taxableAmtC', 12, 2)->default(0);
            $table->decimal('taxableAmtD', 12, 2)->default(0);
            $table->decimal('taxRateA', 5, 2)->default(0);
            $table->decimal('taxRateB', 5, 2)->default(0);
            $table->decimal('taxRateC', 5, 2)->default(0);
            $table->decimal('taxRateD', 5, 2)->default(0);
            $table->decimal('taxAmtA', 12, 2)->default(0);
            $table->decimal('taxAmtB', 12, 2)->default(0);
            $table->decimal('taxAmtC', 12, 2)->default(0);
            $table->decimal('taxAmtD', 12, 2)->default(0);
            $table->decimal('totalTaxableAmt', 12, 2)->default(0);
            $table->decimal('totalTaxAmt', 12, 2)->default(0);
            $table->decimal('totalAmt', 12, 2)->default(0);
            $table->string('prchrAcptcYn');
            $table->string('remark')->nullable();
            $table->string('regrNm');
            $table->string('regrId');
            $table->string('modrNm');
            $table->string('modrId');
            $table->string('receipt_CustomerTin');
            $table->string('receipt_CustomerMblNo');
            $table->string('receipt_RptNo')->nullable();
            $table->string('receipt_RcptPbctDt');
            $table->string('receipt_TrdeNm')->nullable();
            $table->string('receipt_Adrs')->nullable();
            $table->string('receipt_TopMsg')->nullable();
            $table->string('receipt_BtmMsg')->nullable();
            $table->string('receipt_PrchrAcptcYn');
            $table->dateTime('createdDate');
            $table->boolean('isKRASynchronized');
            $table->dateTime('kraSynchronizedDate');
            $table->boolean('isStockIOUpdate');
            $table->string('resultCd');
            $table->string('resultMsg');
            $table->string('resultDt');
            $table->unsignedBigInteger('response_CurRcptNo');
            $table->unsignedBigInteger('response_TotRcptNo');
            $table->string('response_IntrlData')->nullable();
            $table->string('response_RcptSign')->nullable();
            $table->dateTime('response_SdcDateTime')->nullable();
            $table->string('response_SdcId')->nullable();
            $table->string('response_MrcNo')->nullable();
            $table->string('qrCodeURL')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_sales_by_trader_invoice_no');
    }
}