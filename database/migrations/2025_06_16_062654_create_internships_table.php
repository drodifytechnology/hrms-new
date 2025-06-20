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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('internship_id')->unique();
            $table->unsignedBigInteger('intern_id');
            $table->unsignedBigInteger('primary_mentor_id');
            $table->unsignedBigInteger('secondary_mentor_id')->nullable();
            $table->enum('internship_type', ['3-months', '6-months', '1-year']);
            $table->enum('stipend_type', ['Paid', 'Unpaid', 'Performance-based']);
            $table->decimal('stipend_amount', 10, 2)->nullable();
            $table->enum('payment_frequency', ['Monthly', 'Bi-weekly'])->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->integer('branch');
            $table->integer('department');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('flexible_duration')->default(false);
            $table->enum('status', ['Active', 'Completed', 'Requested Change'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
