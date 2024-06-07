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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('itemCode')->min(1)->unique();
            $table->string('itemClassifiCode')->min(1);
            $table->string('itemTypeCode')->min(1);
            $table->string('itemName')->min(1);
            $table->string('itemStrdName')->min(1)->nullable();
            $table->string('countryCode')->min(1);
            $table->string('pkgUnitCode')->min(1);
            $table->string('qtyUnitCode')->min(1);
            $table->string('taxTypeCode')->min(1);
            $table->string('batchNo')->min(1)->nullable();
            $table->string('barcode')->min(1)->nullable();
            $table->decimal('unitPrice', 10, 2);
            $table->decimal('group1UnitPrice', 10, 2)->nullable();
            $table->decimal('group2UnitPrice', 10, 2)->nullable();
            $table->decimal('group3UnitPrice', 10, 2)->nullable();
            $table->decimal('group4UnitPrice', 10, 2)->nullable();
            $table->decimal('group5UnitPrice', 10, 2)->nullable();
            $table->string('additionalInfo')->min(1)->nullable();
            $table->decimal('saftyQuantity', 10, 2)->nullable();
            $table->boolean('isInrcApplicable');
            $table->boolean('isUsed');
            $table->decimal('quantity', 10, 2);
            $table->decimal('packageQuantity', 10, 2);

            $table->foreign('itemTypeCode')->references('code')->on('item_type_codes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
