<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MntVideosRequest extends FormRequest
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
            "nombre"=>"required|max:50|unique:videos,nombre,".$this->Video,
            "descripcion"=>"required|max:300",
            "url"=>"required|max:255",
            "imagen"=>"required|max:100",
            "genero_id"=>"required"
        ];
    }
}
