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
            $table->string('name');
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('birthday')->nullable();
            $table->string('interests')->nullable();
            $table->text('bio')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image_url')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
