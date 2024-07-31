@extends('laravel-usp-theme::master')

@section('content')
  Cadastro de Vacinas

  <form action="{{ route('vacinas.store')}}" method="post"> 
    @csrf 
    <div class="form-group">
        Localização: <input class="form-control" name="location" value="{{ old('location') }}">
    </div>

    <div class="form-group">
        Data: <input class="form-control" name="date" value="{{ old('date') }}">
    </div>

    <div class="form-group">
        Vacina: <input class="form-control" name="vaccine" value="{{ old('vaccine') }}">
    </div>

    <div class="form-group">
        URL da fonte: <input class="form-control" name="source_url" value="{{ old('source_url') }}">
    </div>
    
    <div class="form-group">
        Total de vacinações: <input class="form-control" name="total_vaccinations" value="{{ old('total_vaccinations') }}">
    </div>

    <div class="form-group">
        Pessoas vacinadas: <input class="form-control" name="people_vaccinated" value="{{ old('people_vaccinated') }}">
    </div>

    <div class="form-group">
        Pessoas completamente vacinadas: <input class="form-control" name="people_fully_vaccinated" value="{{ old('people_fully_vaccinated') }}">
    </div>

    <div class="form-group">
        Total de reforços: <input class="form-control" name="total_boosters" value="{{ old('total_boosters') }}">
    </div>

    <div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('location').value = '1234567890';
            document.getElementById('date').value = '1234567890';
            document.getElementById('vaccine').value = '1234567890';
            document.getElementById('source_url').value = '1234567890';
            document.getElementById('total_vaccinations').value = '1234567890';
            document.getElementById('people_vaccinated').value = '9781234567890';
            document.getElementById('people_fully_vaccinated').value = 'John Doe';
            document.getElementById('total_boosters').value = '1234567890';
        });
    </script>
</body>
@endsection

   