<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
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
            'nome'=>'required|min:3|max:100',
            'slug'=>'required|min:3|max:100',
            'ativo'=>'required',
            'descricao'=>'max:1000',
            'valor'=>'required|min:1|max:5',
            'quantidade'=>'required|min:1|numeric',
            'categoria_id'=>'required',
            'tamanho'=>'required|max:3',
            'largura'=>'max:3',
            'comprimento'=>'max:3',
            'peso'=>'max:4',
        ];
    }
}
