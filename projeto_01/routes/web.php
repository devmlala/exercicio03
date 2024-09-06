<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


// Route for the index page
Route::get('/', function () {
    return view('index');
});

// Route for the climatologia index page
Route::get('/ciencias', function () {
    return view('ciencias.index');
});

// Route for the climatologia page
Route::get('/ciencias/climatologia', function () {
    return view('ciencias.climatologia');
});
