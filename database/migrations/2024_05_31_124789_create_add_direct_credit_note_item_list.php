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
        Schema::create('direct_credit_note_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direct_credit_note_id');
            $table->string('itemCode');
            $table->decimal('unitPrice', 15, 2);
            $table->integer('quantity');

            $table->foreign('direct_credit_note_id')->references('id')->on('direct_credit_notes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direct_credit_note_items');
    }
};