<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Repository;


class ArchivosController extends Controller
{
    
    use TraitUploadFiles;
    
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
        $archivos = Repository::paginate(15);
        $filtro = "";
        return view("repositorio.index",compact("archivos","filtro"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("repositorio.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repositorio = new Repository();
        try{
            $archivo = $this->uploadFile($request->file("documento"), 'docs', true);
            $repositorio->archivo = $request->input("archivo");
            $repositorio->descripcion = $request->input("descripcion");
            $repositorio->ruta = $archivo;
            $repositorio->save();
            
            Session::flash("message-ok","El registro ha sido creado.");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar crear el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/repository");
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
        $repositorio = Repository::find($id);
        return view("repositorio.editar",compact("repositorio"));
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
        $repositorio = Repository::find($id);
        try{
            $archivo = $this->uploadFile($request->file("documento"), 'docs', true);
            $repositorio->archivo = $request->input("archivo");
            $repositorio->descripcion = $request->input("descripcion");
            if($archivo != ""){
                $repositorio->ruta = $archivo;
            }
            $repositorio->save();
            
            Session::flash("message-ok","El registro ha sido actualizado!");
        } catch (Exception $ex) {
            Session::flash("message-error","Erro al intentar actualizar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/repository");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $repositorio = Repository::find($id); 
       try{
           \Storage::delete("docs/".$repositorio->archivo);
           $repositorio->delete();
           
           Session::flash("message-ok","El registro ha sido eliminado!");
       } catch (Exception $ex) {
           Session::flash("message-erro","Erro al intentar eliminar el registro!");
       }
       
       return Redirect::to("/repository");
    }
}
