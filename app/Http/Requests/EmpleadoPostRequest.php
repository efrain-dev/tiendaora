<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoPostRequest extends FormRequest
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
            'id_empleado'=>'nullable',

            'nit_empleado'=>'required',
            'nombre_empleado'=>'required',
            'contraseña'=>'nullable',
            'direccion'=>'required',
            'telefono'=>'required',
        ];
    }
}
