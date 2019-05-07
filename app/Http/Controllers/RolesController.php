<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Roles;

class RolesController extends Controller
{
    public function __construct(){
       $this->middleware('auth');
       $this->middleware('MDAdmin', ['only'=>['create','store','edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::paginate(15);
        $filtro = "";
        return view("roles.index", compact("roles","filtro"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view("roles.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        $rol = new Roles();
        try{
            $rol->rol = $request->input("rol");
            $rol->save();

            Session::flash("message-ok","El registro ha sido creado exitosamente!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar crear el registro: ".$ex->getMessage());
        }

        return Redirect::to("/roles");
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
        $rol = Roles::find($id);
        return view("roles.editar",compact("rol"));
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
        $rol = Roles::find($id);
        try{
            $rol->rol = $request->input("rol");
            $rol->save();

            Session::flash("message-ok","El registro ha sido actualizado exitosamente!");
        }catch(Exception $ex){
            Sesion::flash("message-error","Error al intentar  actualizar el registro: ".$ex->getMessage());
        }

        return Redirect::to("/roles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Roles::find($id);
        try{
            $rol->delete();
            
            Session::flash("message-ok","El registro ha sido eliminado!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar eliminar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/roles");
    }
    
    public function filtrar(Request $request){
        $filtro = $request['filtro'];
        if($filtro == ""){
            return Redirect::to("/roles");
        }else{
            $roles = Roles::filtrar($filtro);
            return view("roles.index",compact("roles","filtro"));
        }
    }
}
