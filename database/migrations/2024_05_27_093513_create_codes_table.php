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
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->string('cdCls', 10)->unique();
            $table->string('cdClsNm', 50);
            $table->string('cdClsDesc', 100)->nullable();
            $table->char('useYn', 1)->default('Y');
            $table->string('userDfnNm1', 50)->nullable();
            $table->string('userDfnNm2', 50)->nullable();
            $table->string('userDfnNm3', 50)->nullable();

            $table->index('cdCls');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codes');
    }
};
