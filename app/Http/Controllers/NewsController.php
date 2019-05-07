<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\NewsModel as News;
use Auth;

class NewsController extends Controller
{
    use TraitUploadFiles;
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('MDAdmin', ['only' => ['create', 'edit','delete']]); //Ejecuta el middleware de permisos
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = News::paginate(15);
        $filtro = "";
        return view("noticias.index", compact("noticias","filtro"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("noticias.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {
        $noticia = new News();
        try{
            $this->grabar($request, $noticia);
            
            Session::flash("message-ok","El registro ha sido creado!");
        } catch (Exception $ex) {
            Session::flash("message-error","Error al intentar crear el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/noticias");
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
        $noticia = News::find($id);
        return view("noticias.editar", compact("noticia"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $noticia = News::find($id);
        try{
            $this->grabar($request, $noticia);
            
            Session::flash("message-ok","El registro ha sido actualizado!");
        } catch (Exception $ex) {
            Session::flash("message-error","Error al intentar actualizar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/noticias");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = News::find($id);
        try{
            \Storage::delete("news/".$noticia->imagen);
            $noticia->delete();
            
            Session::flash("message-ok","El registro ha sido eliminado");
        } catch (Exception $ex) {
            Session::flash("message-error","Error al intentar eliminar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/noticias");
    }
    
    private function grabar($request, $noticia){        
        $archivo = $this->uploadFile($request->file('imagen'), 'news', true);
        if($archivo == ""){
            $archivo = $request->input("imgActual");
        }
        $noticia->titulo = $request->input("titulo");
        $noticia->noticia = $request->input("noticia");
        $noticia->fecha = $request->input('fecha');
        $noticia->user_id = Auth::user()->id;
        $noticia->imagen = $archivo;
        $noticia->save();
    }
    
    public function filtrar(Request $request){
        $filtro = $request['filtro'];
        if($filtro == ""){
            return Redirect::to("/noticias");
        }else{
            $noticias = News::filtrar($filtro);
            return view("noticias.index",compact("noticias","filtro"));
        }
    }
}
