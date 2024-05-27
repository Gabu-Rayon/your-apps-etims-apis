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
            $table->string('supplier_tin');
            $table->string('supplier_bhf_id');
            $table->string('supplier_name');
            $table->string('supplier_invc_no');
            $table->string('type_code');
            $table->string('status_code');
            $table->string('pmt_type_code');
            $table->timestamp('purch_date');
            $table->timestamp('occurred_date');
            $table->timestamp('confirm_date')->nullable();
            $table->timestamp('warehouse_date')->nullable();
            $table->string('remark')->nullable();
            $table->string('mapping')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}