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
        Schema::create('mapped_imported_item_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mapped_imported_item_id');
            $table->string('taskCode');
            $table->string('itemCode');
            $table->timestamps();

            $table->foreign('mapped_imported_item_id')->references('id')->on('mapped_imported_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapped_imported_item_lists');
    }
};