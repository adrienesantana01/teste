<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
         return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|max:23',
            'idade' => 'required|numeric|max:100|min:12',
            'birth_year' => 'required|date|before:yesterday',
            'votes' => 'required|numeric',
            'description' => 'required|string|min:10',
            'amount' => 'required|numeric|max:200|min:100',
        ];
    }

      public function messages()
    {
        return [
            'nome.required' => 'Máximo 23 caracteres',
            'idade.required'  => 'No mínimo 12 anos no máximo 100',
            'birth_year.required'  => 'Não pode ser a data de ontem',
            'votes.required'  => 'Número do telefone',
            'description.required'  => 'No minimo 10 caracteres',
            'amount.required'  => 'Altura em cm entre 100 e 200',
             
        ];
    }
}
