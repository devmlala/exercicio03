@extends('laravel-usp-theme::master')


@section('content')

<form>
    @csrf
    <input name="search" value="{{ request()->search }}">
    <button type="submit">Buscar</button>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Título</th>
      <th scope="col">Autor</th>
      <th scope="col">Isbn</th>
      <th scope="col">Preço</th>
    </tr>
  </thead>
  <tbody>
    @foreach($livros as $livro)
        <tr>
            <td>{{ $livro->titulo }}</td>
            <td>{{ $livro->autor }}</td>
            <td>{{ $livro->isbn }}</td>
            <td>R$ {{ $livro->preco }}</td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection

   