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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('stream_id')->constrained()->onDelete('cascade');
            $table->string('semester')->nullable();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->string('unit')->nullable();
            $table->text('topic')->nullable();
            $table->string('references')->nullable();
            $table->string('delivery_mode')->nullable();
            $table->string('class_no')->nullable();
            $table->dateTime('start_time')->default(now());
            $table->dateTime('end_time')->default(now()->addHours(1));
            $table->smallInteger('no_of_students')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
