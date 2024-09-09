<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CienciaController extends Controller
{
    public function index()
    {
        // Buscar todas as categorias com seus materiais
        $categories = Category::with('materials')->get();

        // Passar todas as categorias e seus materiais para a view
        return view('ciencias.index', [
            'categories' => $categories,
        ]);
    }
}
