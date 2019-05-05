<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Genre;

class GeneroController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('MDAdmin',['only'=>['create','edit','delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genre::paginate(10);
        $filtro = "";
        return view("generos.index",compact("generos","filtro"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("generos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genero = new Genre();
        try{
            $genero->genero = $request->input("genero");
            $genero->save();

            Session::flash("message-ok","El registro ha sido creado");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar crear el registro: ".$ex->getMessage());
        }

        return Redirect::to("generos");
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
        $genero = Genre::find($id);
        if(is_null($genero)){
            return view("generos.create");
        }else{
            return view("generos.editar", compact("genero"));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genero = Genre::find($id);
        try{
            $genero->genero = $request->input("genero");
            $genero->save();

            Session::flash("message-ok", "El registro ha sido actualizado exitosamente!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar actualizar el registro: ".$ex->getMessage());
        }

        return Redirect::to("generos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genre::find($id);
        try{
            $genero->delete();
            Session::flash("message-ok","El registro ha sido eliminado!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar eliminar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("generos");
    }
}
