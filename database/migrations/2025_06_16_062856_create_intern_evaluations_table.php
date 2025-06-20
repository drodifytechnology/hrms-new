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
        Schema::create('intern_evaluations', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('internship_id');
            $table->unsignedBigInteger('evaluator_id');
            $table->integer('score')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();
            $table->foreign('internship_id')->references('id')->on('internships')->onDelete('cascade');
        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern_evaluations');
    }
};
