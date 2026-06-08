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
        Schema::create('zapisies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
            ->nullable()
                ->constrained('courses')
                ->onDelete('cascade');
            $table->string('course_name');
            $table->foreignId('candidate_id')
            ->nullable()
                ->constrained('candidates')
                ->onDelete('cascade');
            $table->string('candidate_name');
            $table->string('candidate_surname');
            $table->string('status');
            $table->timestamps();
            $table->foreignId('user_id')
            ->nullable()
                ->constrained('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zapisies');
    }
};
