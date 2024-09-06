<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
        $rules = [
            'titulo' => 'required',
            'autor'  => 'required',
            'isbn' => 'required|integer',
            'preco' => 'required|integer',
        ];
        return $rules;
    }
    
    protected function prepareForValidation(){
            $this->merge([
            'isbn' => str_replace('-','',$this->isbn),
            ]);
    }

    public function messages()
{
    #personalizar mensagens
    return [
        'titulo.required' => 'Este titulo é requisitado',
        'isbn.required' => 'Este isbn é requerido',
    ];
}

}