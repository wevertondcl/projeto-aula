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
        Schema::create('agenda_dia_horario_agendados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agenda_dia_horario_id')->constrained()->onDelete('cascade');
            $table->string('nome');
            $table->string('email');
            $table->boolean('corte')->default(false);
            $table->boolean('barba')->default(false);
            $table->boolean('sobrancelha')->default(false);
            $table->boolean('confirmado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_dia_horario_agendados');
    }
};
