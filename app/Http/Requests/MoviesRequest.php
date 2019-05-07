<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest
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
            "nombre"  => "required|unique:movies,nombre,".$this->movie,   
            "duracion" => "required",
            "reparto" => "required", 
            "director" => "required",   
            "genre_id" => "required",
            "triller" => "required",
            "resumen" => "required|max:500"
            //
        ];
    }
}
