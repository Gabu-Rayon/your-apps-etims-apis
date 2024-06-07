<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddDirectCreditNoteItemListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_direct_credit_note_item_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('add_direct_credit_note_id')->constrained('add_direct_credit_note')->onDelete('cascade');
            $table->string('itemCode');
            $table->decimal('unitPrice', 15, 2);
            $table->integer('quantity');
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
        Schema::dropIfExists('add_direct_credit_note_item_list');
    }
}