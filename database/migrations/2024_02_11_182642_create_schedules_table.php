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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('from');
            $table->date('to');
            $table->time('start_at');
            $table->time('end_at');
            $table->foreignId('course_id')->constrained();
            $table->foreignId('instructor_id')->constrained('users'); // Must Type Of User Instructor
            $table->foreignId('class_room_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
