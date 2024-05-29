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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customerNo')->unique();
            $table->string('customerTin')->unique();
            $table->string('customerName');
            $table->string('address');
            $table->string('telNo');
            $table->string('email');
            $table->string('faxNo');
            $table->boolean('isUsed');
            $table->string('remark');

            $table->index('customerNo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
