<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_week')->nullable(); //день недели
            $table->foreignId('callingSchedule_id')
                ->nullable()
                ->constrained('calling_schedules')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('classRoom_id')
                ->nullable()
                ->constrained('classrooms')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('item_id')
                ->nullable()
                ->constrained('items')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('teacher_id')
                ->nullable()
                ->constrained('teachers')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('schoolClass_id')
                ->nullable()
                ->constrained('school_classes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            // $table->foreignId('class_id')
            //     ->nullable()
            //     ->constrained('school_classes')
            //     ->cascadeOnUpdate()
            //     ->noActionOnUpdate();
            // $table->foreignId('callingSchedule_id')
            //     ->nullable()
            //     ->constrained('calling_schedules')
            //     ->cascadeOnUpdate()
            //     ->noActionOnUpdate();
            // $table->string('subject')->nullable();
            // $table->foreignId('classroom_id')
            //     ->nullable()
            //     ->constrained('classrooms')
            //     ->cascadeOnUpdate()
            //     ->noActionOnUpdate();
            // $table->foreignId('user_id')
            //     ->nullable()
            //     ->constrained('users')
            //     ->cascadeOnUpdate()
            //     ->noActionOnUpdate();
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
