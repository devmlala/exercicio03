<!-- resources/views/vacinas/edit.blade.php -->
@extends('laravel-usp-theme::master')

@section('content')
  <h1>Editar Vacina</h1>
  <form action="{{ route('vacinas.update', $vacina->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      Localização: <input class="form-control" name="location" value="{{ old('location', $vacina->location) }}">
    </div>

    <div class="form-group">
      Data: <input class="form-control" name="date" value="{{ old('date', $vacina->date) }}">
    </div>

    <div class="form-group">
      Vacina: <input class="form-control" name="vaccine" value="{{ old('vaccine', $vacina->vaccine) }}">
    </div>

    <div class="form-group">
      URL da fonte: <input class="form-control" name="source_url" value="{{ old('source_url', $vacina->source_url) }}">
    </div>

    <div class="form-group">
      Total de vacinações: <input class="form-control" name="total_vaccinations" value="{{ old('total_vaccinations', $vacina->total_vaccinations) }}">
    </div>

    <div class="form-group">
      Pessoas vacinadas: <input class="form-control" name="people_vaccinated" value="{{ old('people_vaccinated', $vacina->people_vaccinated) }}">
    </div>

    <div class="form-group">
      Pessoas completamente vacinadas: <input class="form-control" name="people_fully_vaccinated" value="{{ old('people_fully_vaccinated', $vacina->people_fully_vaccinated) }}">
    </div>

    <div class="form-group">
      Total de reforços: <input class="form-control" name="total_boosters" value="{{ old('total_boosters', $vacina->total_boosters) }}">
    </div>

    <div>
      <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
  </form>
@endsection
