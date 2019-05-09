<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            "name"=>"required",  //Debe hacer referencia al nombre del objeto de formulario (DOM) no el nombre del campo de la base de datos
            "email"=>"required|email|max:30|unique:users,email,".$this->usuario,
            "rol_id"=>"required",
            "password"=>"required",
            "foto"=>"max:100"
        ];
    }
}
