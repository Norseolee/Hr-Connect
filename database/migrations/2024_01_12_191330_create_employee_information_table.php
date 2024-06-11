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
        Schema::create('employee_informations', function (Blueprint $table) {
            $table->id('employee_id');
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth', 90)->nullable();
            $table->string('nationality', 90)->nullable();
            $table->string('civil_status', 90)->nullable();
            $table->string('mobile_no', 200)->nullable();
            $table->string('email_address', 90)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('city', 90)->nullable();
            $table->string('street', 90)->nullable();
            $table->string('province', 90)->nullable();
            $table->string('phone_no', 200)->nullable();
            $table->string('gender', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_informations');
    }
};
