<?php

namespace App\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //regras de autorização
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
            'nome' => 'required|min:3|max:50',
            'numero' => 'required|numeric',
            'categorias' => 'required',
            'descricao' => 'min:3|max:1000'
        ];
    }

    public function messages(){

        return  [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve ter mais que :min caracteres',
            'max' => 'O campo :attribute deve ter até :max caracteres',
            'numeric' => 'O campo :attribute conter apenas números'
        ];

    }


}
