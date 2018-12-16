<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CuponFormRequest extends FormRequest
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
            'nome'=>'required|min:3|max:100|unique:cupons',
            'localizador'=>'required|min:3|max:100|unique:cupons',
            'ativo'=>'required',
            'dthr_validade'=>'required',
            'desconto'=>'required|min:1|max:5',
            'modo_desconto'=>'required',
            'modo_limite'=>'required',
            'limite'=>'required|min:1|max:5',
        ];
    }
    public function messages(){
        return [
            'nome.required' => 'O campo nome é de preenchimento obrigatório!',
            'localizador.required' => 'O campo localizador é de preenchimento obrigatório!',
            'dthr_validade.required' => 'O campo validade é de preenchimento obrigatório!',
        ];
    }
}
