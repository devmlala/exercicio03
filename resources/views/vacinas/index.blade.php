@extends('laravel-usp-theme::master')

@section('content')

<!-- Formulário de busca -->
<div class="d-flex justify-content-between mb-3">
    <form method="GET" action="{{ route('vacinas.index') }}" class="d-flex align-items-center">
        @csrf
        <input name="search" value="{{ request()->search }}" placeholder="Buscar..." class="form-control me-2">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <div>
        <!-- Botões para importar CSV e deletar todos -->
        <a href="{{ route('vacinas.importarCSVForm') }}" class="btn btn-secondary me-2">Importar CSV</a>
        <form action="{{ route('vacinas.destroyAll') }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Deletar Todos</button>
        </form>
    </div>

</div>


<!-- Tabela de vacinas -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Localização</th>
      <th scope="col">Data</th>
      <th scope="col">Vacina</th>
      <th scope="col">URL da Fonte</th>
      <th scope="col">Total de Vacinações</th>
      <th scope="col">Pessoas Vacinadas</th>
      <th scope="col">Pessoas Completamente Vacinadas</th>
      <th scope="col">Total de Reforços</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($vacinas as $vacina)
        <tr>
            <td>{{ $vacina->location }}</td>
            <td>{{ $vacina->date }}</td>
            <td>{{ $vacina->vaccine }}</td>
            <td>{{ $vacina->source_url}}
            <td>{{ $vacina->total_vaccinations }}</td>
            <td>{{ $vacina->people_vaccinated }}</td>
            <td>{{ $vacina->people_fully_vaccinated }}</td>
            <td>{{ $vacina->total_boosters }}</td>
            <td>
                <!-- Botões de ação -->
                <a href="{{ route('vacinas.edit', $vacina) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                <form action="{{ route('vacinas.destroy', $vacina) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
