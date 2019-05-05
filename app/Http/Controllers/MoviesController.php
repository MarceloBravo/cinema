<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MoviesRequest;
use App\Movies;
use App\Genre;
use Auth;

class MoviesController extends Controller
{
    use TraitUploadFiles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
       $this->middleware('MDAdmin', ['only'=>['create','store','edit','update','destroy']]);
    }
    
    public function index()
    {
        //$movies = Movies::paginate(15);
        $movies = Movies::getAllMovies();
        $filtro = "";
        return view('movies.index', compact('movies', 'filtro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genre::pluck("genero", "id");
        return view("movies.crear", compact("generos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoviesRequest $request)
    {
        $movie = new Movies();
        try{
            $this->grabar($request, $movie);

            Session::flash("message-ok","La pelicula ha sido registrada!");            
        }catch(Exception $ex){            
            Session::flash("message-error","Error al intentar registrar la pelicula: ".$ex->getMessage());
        }

        return Redirect::to("/movies");
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
        $pelicula = Movies::find($id);
        $generos = Genre::pluck("genero","id");
        return view("movies.editar", compact("pelicula","generos"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MoviesRequest $request, $id)
    {
        $pelicula = Movies::find($id);
        try{
            $this->grabar($request, $pelicula);

            Session::flash("message-ok","La pelicula ha sido actualizada!");            
        }catch(Exception $ex){            
            Session::flash("message-error","Error al intentar actualizar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/movies");
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
            $pelicula = Movies::find($id);
            \Storage::delete("afiches/".$pelicula->afiche);
            $pelicula->delete();
            
            Session::flash("message-ok","La pelicula ha sido eliminada!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar eliminar el registro: ".$ex->getMessage());
        }
        return Redirect::to("/movies");
    }
    
    private function grabar(MoviesRequest $request, $pelicula){
        //$archivo = Movies::setPathAttribute($request->file("afiche"));
        $archivo = $this->uploadFile($request->file("afiche"));
        if($archivo == ""){
            $archivo = $request->input("aficheActual");
        }
        
        $pelicula->nombre = $request->input("nombre");
        $pelicula->duracion = $request->input("duracion");
        $pelicula->reparto = $request->input("reparto");
        $pelicula->director = $request->input("director");
        $pelicula->afiche = $archivo;
        $pelicula->genre_id = $request->input("genero_id");
        $pelicula->triller = $request->input("triller");
        $pelicula->fecha = $request->input("fecha");
        $pelicula->resumen = $request->input("resumen");
        $pelicula->user_id = Auth::user()->id;            
        $pelicula->save();
    }
}
