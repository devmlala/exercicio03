<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Replicado;
use App\Http\Controllers\VacinaController;
use App\Models\Vacina;

class IndexController extends Controller
{
    public function index(){
        
        $vacinas = Vacina::select('vacinas.*')->paginate(3);

        $email = Pessoa::retornarEmailUsp(14599936); //passar o numero usp entre os parenteses
        
        return view('index', ['email' => $email, 'vacinas' => $vacinas]);
    }
}

