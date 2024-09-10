<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título do material
            $table->text('description'); // Descrição do material
            $table->unsignedBigInteger('category_id'); // Referência à categoria
            $table->timestamps();

            // Define a chave estrangeira para categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Remove a chave estrangeira
        });

        Schema::dropIfExists('materials');
    }
}
