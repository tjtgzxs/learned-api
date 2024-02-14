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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('fact')->nullable();
            $table->string('source')->nullable();
            $table->unsignedBigInteger('category_id')->default(0);
            $table->integer('voteInteresting')->default(0);
            $table->integer('voteFalse')->default(0);
            $table->integer('voteMindBlowing')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
