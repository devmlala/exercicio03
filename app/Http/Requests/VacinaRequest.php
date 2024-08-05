<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location'                => 'required|string|max:255',
            'date'                    => 'required|date_format:d/m/Y', // Valida o formato dd/mm/yyyy
            'vaccine'                  => 'required|string|max:255',
            'source_url'              => 'nullable|url',
            'total_vaccinations'      => 'required|integer',
            'people_vaccinated'       => 'required|integer',
            'people_fully_vaccinated' => 'nullable|integer',
            'total_boosters'          => 'nullable|integer',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    public function prepareForValidation()
    {
        $this->merge([
            'date' => str_replace('/', '-', $this->date), // Prepare the date for validation
        ]);
    }

    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'total_vaccinations.required' => 'O campo total de vacinações é obrigatório.',
            'people_vaccinated.required'  => 'O campo pessoas vacinadas é obrigatório.',
            'date.date_format'            => 'A data deve estar no formato dd/mm/yyyy.',
            'source_url.url'              => 'A URL fornecida não é válida.',
        ];
    }
}

