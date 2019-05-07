<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
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
    public function store(CreateGenreRequest $request)
    {
        $genero = new Genre();
        $genero->fill($request->all())->save();
        Session::flash("message-ok","El registro ha sido creado");        
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
    public function update(UpdateGenreRequest $request, $id)
    {
        $genero = Genre::find($id);
        $genero->fill($request->all())->save();
        Session::flash("message-ok", "El registro ha sido actualizado exitosamente!");        
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
