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
        Schema::create('brokerinofs', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('bio')->nullable();
            $table->string('image_url')->nullable();
            $table->enum('stars',[1,2,3,4,5])->default(4)->nullable();
            $table->string('country')->default('palstine')->nullable();
            $table->string('city')->default('gaza')->nullable();
            $table->string('birthday')->nullable();
            $table->string('interests')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('brokers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brokerinofs');
    }
};
