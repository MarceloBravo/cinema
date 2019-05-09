<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConfigRequest extends FormRequest
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
            "imagen_portada"=>"required|max:255",
            "nombre_pelicula_portada"=>"required|max:100",
            "censura_pelicula_portada"=>"required|max:30",
            "director_pelicula_portada"=>"required|max:70",
            "calificacion_pelicula_portada"=>"required|max:20",
            "fecha_pelicula_portada"=>"required|max:100",
            "genre_id"=>"required",
            "resena_pelicula_portada"=>"required|max:500",
            "nombre_app"=>"required|max:50",
            "imagen_app"=>"required|max:50",
            "footer_title"=>"required|max:50",
            "footer_text"=>"required|max:50",
            "footer_text2"=>"required|max:50",
            "titulo1"=>"required|max:150",
            "titulo2"=>"max:150",
            "titulo3"=>"max:150",
            "titulo4"=>"max:150"
        ];
    }
}
