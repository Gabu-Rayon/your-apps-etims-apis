<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use
Illuminate\Support\Facades\Schema;
class CreatePurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('supplierTin');
            $table->string('supplierBhfId');
            $table->string('supplierName');
            $table->string('supplierInvcNo');
            $table->string('purchTypeCode');
            $table->string('purchStatusCode');
            $table->string('pmtTypeCode');
            $table->date('purchDate');
            $table->date('occurredDate');
            $table->date('confirmDate');
            $table->date('warehouseDate');
            $table->text('remark');
            $table->text('mapping');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}