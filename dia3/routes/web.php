<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LivroController;

//Página inicial
Route::get('/',[IndexController::class,'index']);



# rotas para CRUD do model Livro 
Route::get('/livros/create', [LivroController::class,'create']);
Route::post('/livros', [LivroController::class,'store']);
Route::get('/livros', [LivroController::class,'index']);

