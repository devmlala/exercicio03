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
            $table->string('total_vaccinations')->change();
            $table->string('people_vaccinated')->change();
        });
    }
};















