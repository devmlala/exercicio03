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
        Schema::table('vacinas', function (Blueprint $table) {
            // Alterar colunas para inteiro
            $table->integer('total_vaccinations')->change();
            $table->integer('people_vaccinated')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacinas', function (Blueprint $table) {
            // Reverter as colunas para string
            $table->string('total_vaccinations')->change();
            $table->string('people_vaccinated')->change();
        });
    }
};




















