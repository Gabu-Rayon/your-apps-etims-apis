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
        Schema::create('purchase_lists', function (Blueprint $table) {
            $table->id();
            $table->string('spplrTin');
            $table->string('spplrNm');
            $table->string('spplrBhfId');
            $table->string('spplrInvcNo');
            $table->string('spplrSdcId');
            $table->string('spplrMrcNo');
            $table->string('rcptTyCd');
            $table->string('pmtTyCd');
            $table->dateTime('cfmDt');
            $table->date('salesDt');
            $table->dateTime('stockRlsDt')->nullable();
            $table->integer('totItemCnt');
            $table->decimal('taxblAmtA', 10, 2);
            $table->decimal('taxblAmtB', 10, 2);
            $table->decimal('taxblAmtC', 10, 2);
            $table->decimal('taxblAmtD', 10, 2);
            $table->decimal('taxblAmtE', 10, 2);
            $table->decimal('taxRtA', 5, 2);
            $table->decimal('taxRtB', 5, 2);
            $table->decimal('taxRtC', 5, 2);
            $table->decimal('taxRtD', 5, 2);
            $table->decimal('taxRtE', 5, 2);
            $table->decimal('taxAmtA', 10, 2);
            $table->decimal('taxAmtB', 10, 2);
            $table->decimal('taxAmtC', 10, 2);
            $table->decimal('taxAmtD', 10, 2);
            $table->decimal('taxAmtE', 10, 2);
            $table->decimal('totTaxblAmt', 10, 2);
            $table->decimal('totTaxAmt', 10, 2);
            $table->decimal('totAmt', 10, 2);
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_lists');
    }
};