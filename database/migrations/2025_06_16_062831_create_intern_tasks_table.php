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
        Schema::create('intern_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('internship_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('attachment')->nullable();
            $table->integer('priority')->default(1);
            $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Pending');
            $table->date('deadline')->nullable();
            $table->timestamps();
            $table->foreign('internship_id')->references('id')->on('internships')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern_tasks');
    }
};
