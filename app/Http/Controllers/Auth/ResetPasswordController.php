<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
//use App\Movies;
use App\NewsModel as News;
//use Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function getEmail(){
        $conf = $this->infoPortada();
        $carrusel1 = $conf["carrusel1"];
        $carrusel2 = $conf["carrusel2"];
        $config = $conf["movie"];
        $noticias = News::paginate(5);
        return view('auth.password',compact('carrusel1', 'carrusel2', 'config', 'noticias'));        
    }
    
    public function postEmail(Request $request){
     try{
            Mail::send('email.correo_password', $request->all(), function($mail){
                $mail->subject("Restauración de contraseña");
                $mail->to("mabc@live.cl");
            });
            Session::flash("message-ok","El correo ha sido enviado!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar enviar el correo electrónico: ".$ex->getMessage());
        }
        return Redirect::to("/password/email");   
    }
    
    
    public function getReset($token){
        return view("auth.reset");
    }
    
    public function postReset(Request $request){
        if($request->input("password") != $request->input("confirmPassword")){
            Session::flash("message-error","La contraseña y la confirmación de contraseña no coinciden.");
            return Redirect::back();
        }else{
            try{
                $user = DB::Table('users')->select("users.id")->where("email","=",$request->input("email"))->first();   //A diferencia de get first() debuelve un objeto y no un array como el el caso de get()

                $usuario = User::find($user->id);
                $usuario->password = bcrypt($request->input("password"));
                $usuario->save();

                Session::flash("message-ok","La contraseña ha sido actualizada!");                
                return Redirect::to("home");
            }catch(Exception $ex){
                Session::flash("message-error","Error al intentar registrar la nueva contraseña: ".$ex->getMessage());
                return Redirect::back();
            }
            
        }
    }
    
    private function infoPortada(){
        $carrusel1 = DB::Table("movies")->select("movies.*")->orderBy("created_at", "asc")->paginate(20);
        $carrusel2 = DB::Table("movies")->select("movies.*")->orderBy("created_at", "asc")->paginate(10);
        $movie = DB::Table("config")
                ->join("genres","genres.id", "=", "config.genre_id")
                ->select("config.*", "genres.genero")
                ->first();
        return compact("carrusel1","carrusel2","movie");
    }
}
