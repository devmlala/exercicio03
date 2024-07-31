 @extends('laravel-usp-theme::master')

@section('content')
  <h1>Meu Sistema</h1>

  <form action="{{ route('vacinas.index') }}" method="GET">
    @csrf
    <input name="search" value="{{ request()->search }}">
    <button type="submit">Buscar</button>
  </form>
</br>
  <!--<a href="{{ route('vacinas.criar') }}" class="btn btn-primary">Adicionar</a>-->

@endsection

