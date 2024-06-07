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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('tin', 100)->unique();
            $table->string('bhfId', 10)->unique();
            $table->string('bhfNm', 100);
            $table->string('bhfSttsCd', 100);
            $table->string('prvncNm', 100);
            $table->string('dstrtNm', 100);
            $table->string('sctrNm', 100);
            $table->string('locDesc', 100);
            $table->string('mgrNm', 100);
            $table->string('mgrTelNo', 100);
            $table->string('mgrEmail', 100);
            $table->string('hqYn', 100);

            $table->index('bhfId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
