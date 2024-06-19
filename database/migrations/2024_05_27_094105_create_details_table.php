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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('cdCls', 10);
            $table->string('cd', 10);
            $table->string('cdNm', 50);
            $table->string('cdDesc', 100)->nullable();
            $table->char('useYn', 1)->default('Y');
            $table->integer('srtOrd')->default(0);
            $table->string('userDfnCd1', 50)->nullable();
            $table->string('userDfnCd2', 50)->nullable();
            $table->string('userDfnCd3', 50)->nullable();

            $table->foreign('cdCls')->references('cdCls')->on('codes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
