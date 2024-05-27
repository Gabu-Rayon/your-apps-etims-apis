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
            $table->foreignId('purchase_id')->constrained()->onDelete('cascade');
            $table->string('item_code');
            $table->string('supplr_item_cls_code');
            $table->string('supplr_item_code');
            $table->string('supplr_item_name');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->integer('pkg_quantity');
            $table->decimal('discount_rate', 10, 2);
            $table->decimal('discount_amt', 10, 2);
            $table->timestamp('item_expr_dt');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_items');
    }
}