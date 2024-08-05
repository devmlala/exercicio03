<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDateColumnInVacinasTable extends Migration
{
    public function up(): void
    {
        Schema::table('vacinas', function (Blueprint $table) {
            $table->date('date')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('vacinas', function (Blueprint $table) {
            $table->string('date')->nullable()->change();
        });
    }
}
