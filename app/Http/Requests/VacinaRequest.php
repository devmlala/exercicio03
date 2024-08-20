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
    public function rules(): array{
        return [
            'total_vaccinations' => 'required',
            'people_vaccinated'  => 'required',
            'date' => 'required|date_format:d/m/Y',
        ];
    }

    /*
    public function prepareForValidation(){
        $this->merge([
            'date' => str_replace('/','-',$this->date),
        ]);
    }
    */


    public function messages()
    {
        //dd('cheguei');
        return [
            'total_vaccinations.required' => 'Este campo é requisitado',
            'people_vaccinated.required' => 'Este campo é requerido',
            'date.required' => 'Este campo é requerido',
            'date.date_format' => 'A data deve estar no formato dd/mm/yyyy.',

        ];
    }
}