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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('department_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);
            $table->timestamp('employee_timestamp')->useCurrent();
            $table->enum('employee_status', ['Added', 'Update', 'Deleted', ''])->default('');
            $table->string('title', 5)->nullable();
            $table->string('middle_name', 90)->nullable();
            $table->string('maiden_name', 90)->nullable();
            $table->string('nick_name', 90)->nullable();
            $table->string('picture', 200)->default('https://robohash.org/15');
            $table->unsignedBigInteger('schedule_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
