<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerosMusicalesRequest extends FormRequest
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
            "nombre"=>"required|max:20|unique:generos_musicales,nombre,".$this->GeneroMusical,
            "descripcion"=>"required|max:300"
            //
        ];
    }
}
