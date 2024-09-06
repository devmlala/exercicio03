@extends('laravel-usp-theme::master')

@section('content')
  Cadastro de LIvro


  <form method="post" action="/livros">
    @csrf 
    <div class="form-group">
        Título: <input class="form-control" name="titulo" value="{{ old('titulo') }}">
    </div>

    <div class="form-group">
        Autor: <input class="form-control" name="autor" value="{{ old('autor') }}">
    </div>

    <div class="form-group">
        ISBN: <input class="form-control" name="isbn" value="{{ old('isbn') }}">
    </div>

    <div class="form-group">
        Preço: <input class="form-control" name="preco" value="{{ old('preco') }}">
    </div>


    <div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>


  </form>













@endsection

   