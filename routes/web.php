<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\IndexController;

// Página inicial
Route::get('/', [IndexController::class, 'index']);

// Rotas para CRUD do model Vacina
Route::get('/vacinas', [VacinaController::class, 'index'])->name('vacinas.index'); // Listar todas as vacinas
Route::post('/vacinas', [VacinaController::class, 'store'])->name('vacinas.store');

Route::get('/vacinas/create', [VacinaController::class, 'create'])->name('vacinas.create'); // Formulário de criação


Route::get('/vacinas/{vacina}/edit', [VacinaController::class, 'edit'])->name('vacinas.edit'); // Formulário de edição
Route::put('/vacinas/{vacina}', [VacinaController::class, 'update'])->name('vacinas.update'); // Atualizar vacina

Route::delete('/vacinas/{vacina}', [VacinaController::class, 'destroy'])->name('vacinas.destroy'); // Excluir vacina

// Deletar todos os registros
Route::delete('/vacinas/destroyAll', [VacinaController::class, 'destroyAll'])->name('vacinas.destroyAll');


// Importar CSV
Route::get('/vacinas/importarCSV', [VacinaController::class, 'importarCSVForm'])->name('vacinas.importarCSVForm');
Route::post('/vacinas/importarCSV', [VacinaController::class, 'importarCSV'])->name('vacinas.importarCSV');

