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
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Alterando para tipo inteiro conforme solicitado
            $table->integer('total_vaccinations');
            $table->integer('people_vaccinated');
            $table->string('location');
            $table->date('date')->nullable(); // Alterado para tipo date e aceita nulo
            $table->string('vaccine');
            $table->string('source_url');
            $table->integer('people_fully_vaccinated');
            $table->integer('total_boosters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacinas');
    }
};
