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
        Schema::create('mapped_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('supplierInvcNo');
            $table->string('purchaseTypeCode');
            $table->string('purchaseStatusCode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapped_purchases');
    }
};