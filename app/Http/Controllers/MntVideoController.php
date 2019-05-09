<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GeneroMusical as Genero;
use App\Http\Requests\MntVideosRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Video;
use Auth;

class MntVideoController extends Controller
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
        $videos = DB::Table("videos")
                ->join("generos_musicales","generos_musicales.id","=","videos.genero_id")
                ->select("videos.*","generos_musicales.nombre as genero")
                ->paginate(15);
        $filtro = "";
        return view("videos.index", compact("videos","filtro"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::pluck("nombre", "id");
        return view("videos.crear",compact("generos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MntVideosRequest $request)
    {
        $video = new Video(); 
        $video->fill(array_merge($request->all(),["user_id"=>Auth::user()->id]));
        $video->save();
        Session::flash("message-ok","El registro ha sido creado!");
        return Redirect::to("/mnt_videos");
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
        $video = Video::find($id);
        $generos = Genero::pluck("nombre", "id");
        return view("videos.editar", compact("video","generos"));
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
        $video = Video::find($id);
        $video->fill(array_merge($request->all(), ["user_id"=>Auth::user()->id]));
        $video->save();
        Session::flash("message-ok","El registro ha sido actualizado!");
        return Redirect::to("/mnt_videos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        Session::flash("message-ok","El registro ha sido eliminado");
        return Redirect::to("/mnt_videos");
    }
    
    public function filtrar(Request $request){
        $filtro = $request['filtro'];
        if($filtro == ""){
            return Redirect::to("/mnt_videos");
        }else{
            $videos = Video::filtro($filtro);
            return view("videos.index",compact("videos","filtro"));
        }
    }
}
