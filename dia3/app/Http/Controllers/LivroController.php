<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LivroRequest;
use App\Models\Livro;




class LivroController extends Controller
{

    public function index(Request $request){
        if($request->search) {
            $string = '%'.$request->search.'%';
            $livros = Livro::where('titulo','LIKE',$string)
                            ->orWhere('autor','LIKE',$string)
                            ->get();
        } else {
            $livros = Livro::all(); #select * from livros
        }

        return view('livros.index', [
            'livros' => $livros
        ]);
    }


    public function create(){
        return view('livros.create');
    }

    public function store(LivroRequest $request){
        /*
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|integer',
          ]);
        */

        $livro = new Livro;
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->isbn = $request->isbn;
        $livro->preco = $request->preco;
        $livro->save();
        return redirect('/livros');


        //dd('cheguei');
    }




}
