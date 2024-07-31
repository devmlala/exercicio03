<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacina;
use App\Http\Requests\VacinaRequest;
use Illuminate\Support\Facades\Validator;

class VacinaController extends Controller
{
    // Listar todas as vacinas
    public function index(Request $request)
    {
        if ($request->search) {
            $string = '%' . $request->search . '%';
            $vacinas = Vacina::where('total_vaccinations', 'LIKE', $string)
                ->orWhere('people_vaccinated', 'LIKE', $string)
                ->get();
        } else {
            $vacinas = Vacina::all();
        }

        return view('vacinas.index', ['vacinas' => $vacinas]);
    }

    // Mostrar o formulário para criar uma nova vacina
    public function create()
    {
        return view('vacinas.create');
    }

    // Armazenar uma nova vacina no banco de dados
    public function store(VacinaRequest $request)
    {
        $vacina = new Vacina;

        $vacina->location = $request->location;

        // Convertendo a data do formato 'dd/mm/yyyy' para 'yyyy-mm-dd'
        $dateParts = explode('/', $request->date);
        if (count($dateParts) === 3) {
            $vacina->date = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
        } else {
            $vacina->date = '1970-01-01'; // Definindo uma data padrão
        }

        $vacina->vaccine = $request->vaccine;
        $vacina->source_url = $request->source_url;
        $vacina->total_vaccinations = $request->total_vaccinations;
        $vacina->people_vaccinated = $request->people_vaccinated;
        $vacina->people_fully_vaccinated = $request->people_fully_vaccinated;
        $vacina->total_boosters = $request->total_boosters;

        $vacina->save();

        return redirect()->route('vacinas.index');
    }

    // Mostrar o formulário para editar uma vacina existente
    public function edit(Vacina $vacina)
    {
        return view('vacinas.edit', compact('vacina'));
    }

    // Atualizar uma vacina existente no banco de dados
    public function update(VacinaRequest $request, Vacina $vacina)
    {
        $vacina->location = $request->location;

        // Convertendo a data do formato 'dd/mm/yyyy' para 'yyyy-mm-dd'
        $dateParts = explode('/', $request->date);
        if (count($dateParts) === 3) {
            $vacina->date = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
        } else {
            $vacina->date = '1970-01-01'; // Definindo uma data padrão
        }

        $vacina->vaccine = $request->vaccine;
        $vacina->source_url = $request->source_url;
        $vacina->total_vaccinations = $request->total_vaccinations;
        $vacina->people_vaccinated = $request->people_vaccinated;
        $vacina->people_fully_vaccinated = $request->people_fully_vaccinated;
        $vacina->total_boosters = $request->total_boosters;

        $vacina->save();

        return redirect()->route('vacinas.index');
    }

    // Mostrar os detalhes de uma vacina
    public function show(Vacina $vacina)
    {
        return view('vacinas.show', compact('vacina'));
    }

    // Deletar uma vacina existente
    public function destroy(Vacina $vacina)
    {
        $vacina->delete();
        return redirect()->route('vacinas.index');
    }

    // Deletar todos os registros
    public function destroyAll(Request $request){
        // Verifique se a requisição é POST e se o método DELETE é usado
        if ($request->isMethod('post') && $request->method() === 'DELETE') {
            // Excluir todos os registros
            Vacina::query()->delete();
            return redirect()->route('vacinas.index')->with('success', 'Todos os registros foram excluídos.');
        }
        return redirect()->route('vacinas.index')->withErrors('Método inválido para a operação.');
    }


    // Mostrar o formulário para importar CSV
    public function importarCSVForm()
    {
        return view('vacinas.importarcsv');
    }

    // Importar CSV e adicionar dados ao banco de dados
    public function importarCSV(Request $request)
    {
        // Verificar se o arquivo foi enviado corretamente
        if (!$request->hasFile('file') || !$request->file('file')->isValid()) {
            return redirect()->back()->withErrors(['error' => 'O arquivo enviado não é válido.']);
        }

        // Validar o arquivo CSV
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt|max:2048', // máximo de 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Processar o arquivo CSV
        $file = $request->file('file');
        $path = $file->getRealPath();
        $data = array_map('str_getcsv', file($path));

        // Obtendo o cabeçalho do CSV
        $header = $data[0];
        unset($data[0]); // Remove o cabeçalho do array de dados

        // Iterando sobre os dados e criando registros no banco de dados
        foreach ($data as $row) {
            $vacinaData = array_combine($header, $row);

            // Convertendo a data do formato 'dd/mm/yyyy' para 'yyyy-mm-dd'
            if (isset($vacinaData['date']) && !empty($vacinaData['date'])) {
                $dateParts = explode('/', $vacinaData['date']);
                if (count($dateParts) === 3) {
                    $vacinaData['date'] = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
                } else {
                    $vacinaData['date'] = '1970-01-01'; // Definindo uma data padrão
                }
            } else {
                $vacinaData['date'] = '1970-01-01'; // Definindo uma data padrão
            }

            // Verificar se os dados obrigatórios estão presentes e não vazios
            if (isset($vacinaData['total_vaccinations']) && isset($vacinaData['people_vaccinated']) &&
                isset($vacinaData['location']) && isset($vacinaData['vaccine']) && 
                isset($vacinaData['source_url']) && isset($vacinaData['people_fully_vaccinated']) &&
                isset($vacinaData['total_boosters'])) {

                // Criando um novo registro de Vacina no banco de dados
                Vacina::create([
                    'total_vaccinations' => $vacinaData['total_vaccinations'],
                    'people_vaccinated' => $vacinaData['people_vaccinated'],
                    'location' => $vacinaData['location'],
                    'date' => $vacinaData['date'],
                    'vaccine' => $vacinaData['vaccine'],
                    'source_url' => $vacinaData['source_url'],
                    'people_fully_vaccinated' => $vacinaData['people_fully_vaccinated'],
                    'total_boosters' => $vacinaData['total_boosters'],
                ]);
            } else {
                // Log ou manuseio de erro para linhas inválidas
                // e.g., Log::warning('Dados inválidos: ' . json_encode($vacinaData));
            }
        }

        return redirect()->route('vacinas.index')->with('success', 'CSV importado com sucesso.');
    }
}
