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
        Schema::create('books', function (Blueprint $table) {
           
            //$table->id();
            $table->timestamps();	

            $table->bigInteger('goodreads_book_id');
            $table->bigInteger('best_book_id');
            $table->bigInteger('work_id');
            $table->integer('books_count');
            $table->string('isbn')->nullable();
            $table->string('isbn13')->nullable();
            $table->string('authors');
            $table->year('original_publication_year');
            $table->string('original_title')->nullable();
            $table->string('title');
            $table->string('language_code')->nullable();
            $table->float('average_rating');
            $table->integer('ratings_count');
            $table->integer('work_ratings_count');
            $table->integer('work_text_reviews_count');
            $table->integer('ratings_1');
            $table->integer('ratings_2');
            $table->integer('ratings_3');
            $table->integer('ratings_4');
            $table->integer('ratings $table->id();_5');
            $table->string('image_url')->nullable();
            $table->string('small_image_url')->nullable();
        });
    }


    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
