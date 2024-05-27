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
        Schema::create('initializations', function (Blueprint $table) {
            $table->id();
            $table->string('tin');
            $table->string('bhfId');
            $table->string('dvcSrlNo');

            $table->foreign('bhfId')->references('bhfId')->on('branches');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('initializations');
    }
};
