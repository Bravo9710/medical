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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->boolean('isAdmin')->nullable();
            $table->string('email')->unique();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('password');
            $table->string('phone', 255);
            $table->string('address', 255)->nullable();
            $table->string('blood_group', 255)->nullable();
            $table->integer('egn')->unique();
            $table->string('city', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
