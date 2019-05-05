<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Movies;
use App\NewsModel as News;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');        
        return view("index");
    }
    
    
    public function store(Request $request){
        $arrCredenciales = ['email' =>$request->input('email'), 'password'=>$request->input('password')];
        
        if(Auth::attempt($arrCredenciales)){
            return view("index");
        }
        Session::flash('message-error','Usuario y o contraseña incorrectos!');
        return Redirect::to('/');
    }

    public function logout(){
        Auth::logout();
        $config = $this->infoPortada();
        $carrusel1 = $config["carrusel1"];
        $carrusel2 = $config["carrusel2"];
        $movie = $config["movie"];
        $noticias = News::paginate(5);
        return view('home', compact("carrusel1","carrusel2","movie","noticias"));
        //return Redirect::to("index");
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $config = $this->infoPortada();
        $carrusel1 = $config["carrusel1"];
        $carrusel2 = $config["carrusel2"];
        $movie = $config["movie"];
        $noticias = News::paginate(5);
        return view('home',compact('carrusel1', 'carrusel2', 'movie', 'noticias'));
    }
    
    public function reviews(){
        $movies = Movies::paginate(10);        
        return view("reviews",compact("movies"));
    }
    
    private function infoPortada(){
        $carrusel1 = DB::Table("movies")->select("movies.*")->orderBy("created_at", "desc")->paginate(20);
        $carrusel2 = DB::Table("movies")->select("movies.*")->orderBy("created_at", "desc")->paginate(10);
        $movie = DB::Table("config")
                ->join("genres","genres.id", "=", "config.genre_id")
                ->select("config.*", "genres.genero")
                ->first();
        return compact("carrusel1","carrusel2","movie");
    }

}
