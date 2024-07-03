<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ExerciseController;



//importar
Route::get('/livros/importarCSV', [BookController::class, 'importarCSVForm'])->name('books.importarCSVForm');
Route::post('/livros/importarCSV', [BookController::class, 'importarCSV'])->name('books.import');
    




// Rotas para livros (BookController)
Route::post('/livros', [BookController::class, 'store'])->name('books.store');
Route::get('/livros/create', [BookController::class, 'create'])->name('books.create');
Route::get('/livros', [BookController::class, 'index'])->name('books.index');
Route::get('/livros/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/livros/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/livros/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/livros/{book}', [BookController::class, 'destroy'])->name('books.destroy');


Route::delete('/books/destroyAll', [BookController::class, 'destroyAll'])->name('books.destroyAll');






//exportar csv
Route::get('/livros/export', [BookController::class, 'gerarCSV'])->name('books.gerarCSV');
//teste
Route::get('/livros/importarteste', [BookController::class, 'importarteste'])->name('books.importarteste');

