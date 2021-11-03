<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'corporate_name'    => 'required|min:3|max:50',
            'cnpj_cpf'          => 'required|cpf_ou_cnpj|formato_cpf_ou_cnpj'
        ];
    }

    public function messages()
    {
        return [
            'required'      => 'Field :attribute is required.',
            'max'           => 'Field :attribute is max 50 caracter.',
            'min'           => 'Field :attribute is min 3 caracter.',
        ];
    }
}
