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
        Schema::create('stock_move_lists', function (Blueprint $table) {
            $table->id();
            $table->string('custTin');
            $table->string('custBhfId');
            $table->string('sarNo');
            $table->date('ocrnDt');
            $table->integer('totItemCnt');
            $table->decimal('totTaxblAmt', 10, 2);
            $table->decimal('totTaxAmt', 10, 2);
            $table->decimal('totAmt', 10, 2);
            $table->string('remark');

            $table->foreign('custTin')->references('customerTin')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_lists');
    }
};
