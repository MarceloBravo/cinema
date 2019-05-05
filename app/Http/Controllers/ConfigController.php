<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Config;
use App\Genre;
use Auth;

class ConfigController extends Controller
{
    use TraitUploadFiles;
    
    public function __construct() {
        $this->middleware("auth");
        $this->middleware('MDAdmin', ['only'=>['create','store','edit','update','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::all()->first();
        $generos = Genre::pluck("genero", "id");
        if(!isset($config)){
            return view("config.crear", compact("generos"));
        }else{            
            return view("config.editar", compact("config", "generos"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConfigRequest $request)
    {
        $config = new Config();
        try{
            $this->grabar($request, $config);
            
            Session::flash("message-ok","El registro ha sido grabado!");            
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar grabar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/config");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfigRequest $request, $id)
    {
        $config = Config::find($id);
        try{
            $this->grabar($request, $config);
            
            Session::flash("message-ok","El registro ha sido actualizado!");            
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar actualizar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/config");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $config = Config::find($id);
            \Storage::delete("afiches/".$config->imagen_portada);
            $config->delete();
            
            Session::flash("message-ok","La configuración ha sido eliminada!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar eliminar la configuración: ".$ex->getMessage());
        }
        return Redirect::to("/config");
    }
    
    private function grabar($request, $config){
        $archivo = $this->uploadFile($request->file('image'), 'local', true);
        if($archivo == ""){
            $archivo = $request->input("imagenPortada");
        }
        $config->imagen_portada = $archivo;  
        $config->nombre_pelicula_portada = $request->input("pelicula");  
        $config->censura_pelicula_portada = $request->input("edad");  
        $config->director_pelicula_portada = $request->input("director");  
        $config->calificacion_pelicula_portada = $request->input("nota");  
        $config->fecha_pelicula_portada = $request->input("fecha");  
        $config->genre_id = $request->input("genero");  
        $config->resena_pelicula_portada = $request->input("resena");  
        $config->user_id = Auth::user()->id;
        $config->save();
    }
}
