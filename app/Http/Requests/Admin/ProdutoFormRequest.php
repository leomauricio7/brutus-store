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
            'categoria_id'=>'required|numeric',
            'tamanho'=>'max:4',
            'image'=>'required',
            'largura'=>'required|max:4',
            'comprimento'=>'required|max:4',
            'peso'=>'required|max:4',
        ];
    }
}
