<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

trait TraitUploadFiles{

    public function uploadFile($path, $destino = 'local', $sobreescribir = false){
        $name = "";
        if(!empty($path)){
            $name = ($sobreescribir ? "" : Carbon::now()->second).$path->getClientOriginalName();
            //$this->attributes['afiche'] = $name;    //Asigna automáticamente el nombre al cargar los datos en el controlador, con la función fill($request->all())
            \Storage::disk($destino)->put($name, \File::get($path));            
        }
        return $name;   //En el caso de no cargar los datos con la función fill($request->all()), se debuelve el nombre generado para el archivo. 
    }
}