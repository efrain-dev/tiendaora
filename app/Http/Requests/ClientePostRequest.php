<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientePostRequest extends FormRequest
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
            'nit_cliente'=>['required',
                Rule::unique('cliente', 'nit_cliente')->ignore($this->cliente)],
            'nombre_cliente'=>'required',
            'direccion_cliente'=>'nullable',
            'telefono'=>'required',
        ];
    }
}
