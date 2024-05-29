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
        Schema::create('imported_items', function (Blueprint $table) {
            $table->id();
            $table->string('srNo');
            $table->string('taskCode');
            $table->string('itemName');
            $table->string('hsCode');
            $table->string('pkgUnitCode');
            $table->float('netWeight', 8, 2);
            $table->string('invForCode');
            $table->date('declarationDate');
            $table->string('orginNationCode');
            $table->integer('qty');
            $table->string('supplierName');
            $table->float('nvcFcurExcrt', 8, 2);
            $table->integer('itemSeq');
            $table->string('exprtNatCode');
            $table->string('qtyUnitCode');
            $table->string('agentName');
            $table->string('declarationNo');
            $table->integer('package');
            $table->decimal('grossWeight', 10, 2);
            $table->decimal('invForCurrencyAmount', 10, 2);
            $table->string('mapped_itemCd')->nullable();
            $table->timestamp('mapped_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imported_items');
    }
};