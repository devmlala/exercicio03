@extends('laravel-usp-theme::master')

@section('content')
    <div class="container">
        <h1>Cadastro de Vacinas</h1>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif
        <form action="{{ route('vacinas.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="location">Localização:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', 'Localização padrão') }}">
            </div>

            <<div class="form-group">
                <label for="date">Data (dd/mm/yyyy):</label>
                <input type="text" class="form-control" id="date" name="date" value="{{ old('date', '01/01/1970') }}" placeholder="dd/mm/yyyy">
            </div>

            <div class="form-group">
                <label for="vaccine">Vacina:</label>
                <input type="text" class="form-control" id="vaccine" name="vaccine" value="{{ old('vaccine', 'Vacina padrão') }}">
            </div>

            <div class="form-group">
                <label for="source_url">URL da fonte:</label>
                <input type="url" class="form-control" id="source_url" name="source_url" value="{{ old('source_url', 'http://exemplo.com') }}">
            </div>

            <div class="form-group">
                <label for="total_vaccinations">Total de vacinações:</label>
                <input type="number" class="form-control" id="total_vaccinations" name="total_vaccinations" value="{{ old('total_vaccinations', 0) }}">
            </div>

            <div class="form-group">
                <label for="people_vaccinated">Pessoas vacinadas:</label>
                <input type="number" class="form-control" id="people_vaccinated" name="people_vaccinated" value="{{ old('people_vaccinated', 0) }}">
            </div>

            <div class="form-group">
                <label for="people_fully_vaccinated">Pessoas completamente vacinadas:</label>
                <input type="number" class="form-control" id="people_fully_vaccinated" name="people_fully_vaccinated" value="{{ old('people_fully_vaccinated', 0) }}">
            </div>

            <div class="form-group">
                <label for="total_boosters">Total de reforços:</label>
                <input type="number" class="form-control" id="total_boosters" name="total_boosters" value="{{ old('total_boosters', 0) }}">
            </div>

            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>
   

@endsection
