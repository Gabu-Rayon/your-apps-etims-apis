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
        Schema::create('item_classifications', function (Blueprint $table) {
            $table->id();
            $table->string('itemClsCd', 10)->unique();
            $table->string('itemClsNm', 100);
            $table->string('itemClsLvl', 10);
            $table->string('taxTyCd', 10);
            $table->string('mjrTgYn', 1);
            $table->string('useYn', 1);

            $table->index('itemClsCd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_classifications');
    }
};
