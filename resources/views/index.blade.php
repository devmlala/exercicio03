 @extends('laravel-usp-theme::master')

@section('content')
  <h1>Vacinas</h1>

  <form action="{{ route('vacinas.index') }}" method="GET">
    @csrf
    <input name="search" value="{{ request()->search }}">
    <button type="submit">Buscar</button>
  </form>
</br>

@endsection

