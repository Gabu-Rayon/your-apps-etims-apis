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
        Schema::create('branch_users', function (Blueprint $table) {
            $table->id();
            $table->string('branchUserId', 20)->unique();
            $table->string('branchUserName', 60);
            $table->string('password', 255);
            $table->string('address', 200)->nullable();
            $table->string('contactNo', 20)->nullable();
            $table->string('authenticationCode', 100)->nullable();
            $table->string('remark', 2000)->nullable();
            $table->boolean('isUsed')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_users');
    }
};
