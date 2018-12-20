<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
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
            'icon'=>'required',
        ];
    }
    public function messages(){
        return [
            'nome.required' => 'O campo nome é de preenchimento obrigatório!',
            'slug.required' => 'O campo slug é de preenchimento obrigatório!',
            'icon.required' => 'O campo icon é obrigatório!',
        ];
    }
}
