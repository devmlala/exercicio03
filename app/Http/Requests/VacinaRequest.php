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
            'total_vaccinations' => 'required',
            'people_vaccinated'  => 'required',
        ];
        return $rules;
    }

 /*Faça um mutator para mostrar o campo date com o formato brasileiro dd/mm/yyyy 
    e outro mutator para salvá-lo commo yyyy-mm-dd (lembre-se que o formulário deve receber dd/mm/yyyy)
    Implemente o FormRequest garantindo que seja digitado dd/mm/yyyy, além implementar as outras validações
*/

    public function prepareForValidation(){
        $this->merge([
            'date' => str_replace('/','-',$this->date),
        ]);
    }


    public function messages()
    {
        return [
            'total_vaccinations.required' => 'Este campo é requisitado',
            'people_vaccinated.required' => 'Este campo é requerido',
        ];
    }
}