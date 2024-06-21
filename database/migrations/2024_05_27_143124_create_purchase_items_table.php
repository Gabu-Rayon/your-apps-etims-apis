<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->string('itemCode');
            $table->string('supplrItemClsCode');
            $table->string('supplrItemCode');
            $table->string('supplrItemname');
            $table->decimal('quantity', 10, 2);
            $table->decimal('unitPrice', 10, 2);
            $table->decimal('pkgQuantity', 10, 2);
            $table->decimal('discountRate', 10, 2);
            $table->decimal('discountAmt', 10, 2);
            $table->date('itemExprDt');
            $table->timestamps();

            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreign('itemCode')->references('itemCode')->on('items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_items');
    }
}