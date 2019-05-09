<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GenerosMusicalesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\GeneroMusical as Genero;
use Auth;

class GeneroMusicalController extends Controller
{
    
    public function __construct(){
        $this->middleware("auth");
        $this->middleware('MDAdmin', ['only' => ['create', 'edit','delete']]); //Ejecuta el middleware de permisos
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generosMusicales = Genero::paginate(15);
        $filtro = "";
        return view("generos_musicales.index", compact("generosMusicales","filtro"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("generos_musicales.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenerosMusicalesRequest $request)
    {
        $genero = new Genero();
        $genero->fill(array_merge($request->all(), ['user_id'=>Auth::user()->id]));
        $genero->save();
        Session::flash("message-ok","El registro ha sido creado!");
        return Redirect::to("/generos_musicales");
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
        $genero = Genero::find($id);
        return view("generos_musicales.editar",compact("genero"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenerosMusicalesRequest $request, $id)
    {
        $genero = Genero::find($id);
        try{
            $genero->fill(array_merge($request->all(), ['usuer_id'=>Auth::user()->id]));
            $genero->save();
            Session::flash("message-ok","El registro ha sido actualizado!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar actualizar el registro: ".$ex->getMessage());
        }
        return Redirect::to("/generos_musicales");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genero::find($id);
        $genero->delete();
        Session::flash("message-ok","El registro ha sido eliminado!");
        return Redirect::to("/generos_musicales");
    }
    
    public function filtrar(Request $request){
        $filtro = $request['filtro'];
        if($filtro == ""){
            return Redirect::to("/generos_musicales");
        }else{
            $generosMusicales= DB::select("SELECT id, nombre, descripcion "
                    . "FROM generos_musicales "
                    . "WHERE "
                    . "CONCAT(nombre, ' ', descripcion) "
                    . "LIKE :criterio",["criterio"=>"%".$filtro."%"]);
            
            return view("generos_musicales.index", compact("generosMusicales","filtro"));
        }
    }
}
