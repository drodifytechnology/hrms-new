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
        Schema::create('intern_documents', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('internship_id');
            $table->enum('type', ['Aadhar', 'Resume', 'Certificate', 'Photo', 'Bank Passbook']);
            $table->string('file_path');
            $table->timestamps();
            $table->foreign('internship_id')->references('id')->on('internships')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern_documents');
    }
};
