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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('telNumb');
            $table->string('PESEL');
            $table->string('age');
            $table->foreignId('pracownik_id')
                ->nullable()
                ->constrained('pracowniks')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['PESEL']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
