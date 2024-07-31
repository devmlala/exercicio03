<!-- resources/views/vacinas/show.blade.php -->
@extends('laravel-usp-theme::master')

@section('content')
  <h1>Detalhes da Vacina</h1>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">ID: {{ $vacina->id }}</h5>
      <p><strong>Localização:</strong> {{ $vacina->location }}</p>
      <p><strong>Data:</strong> {{ $vacina->date }}</p>
      <p><strong>Vacina:</strong> {{ $vacina->vaccine }}</p>
      <p><strong>Fonte:</strong> <a href="{{ $vacina->source_url }}">{{ $vacina->source_url }}</a></p>
      <p><strong>Total Vacinações:</strong> {{ $vacina->total_vaccinations }}</p>
      <p><strong>Pessoas Vacinadas:</strong> {{ $vacina->people_vaccinated }}</p>
      <p><strong>Pessoas Completamente Vacinadas:</strong> {{ $vacina->people_fully_vaccinated }}</p>
      <p><strong>Total Reforços:</strong> {{ $vacina->total_boosters }}</p>
      <a href="{{ route('vacinas.index') }}" class="btn btn-primary">Voltar</a>
      <a href="{{ route('vacinas.edit', $vacina->id) }}" class="btn btn-warning">Editar</a>
      <form action="{{ route('vacinas.destroy', $vacina->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
    </div>
  </div>
@endsection
