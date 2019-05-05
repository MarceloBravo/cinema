<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "usuario"=>"required",  //Debe hacer referencia al nombre del objeto de formulario (DOM) no el nombre del campo de la base de datos
            "email"=>"required|unique:user",
            "rol_id"=>"required"
            //
        ];
    }
}
