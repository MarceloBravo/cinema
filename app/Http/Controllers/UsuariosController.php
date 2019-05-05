<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Roles;

class UsuariosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');  //Ejecuta el middleware de autentificación
        $this->middleware('MDAdmin', ['only' => ['create', 'edit','delete']]); //Ejecuta el middleware de permisos

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(15);
        
        $filtro = "";
        return view("usuarios.index", compact("usuarios","filtro"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::pluck("rol", "id");
        return view('usuarios.crear', compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $usuario = new User();
        try{
            $usuario->name = $request->input("usuario");
            $usuario->email = $request->input("email");
            $usuario->rol_id = $request->input("rol_id");
            $usuario->password = bcrypt($request->input("password")) ;
            $usuario->save();
            
            Session::flash("message-ok","El usuario ha sido creado!");
        } catch (Exception $ex) {
            Session::flash("message-error","Error al crear el usuario: ".$ex->getMessage());
        }
        
        return Redirect::to("/usuarios");
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
        $usuario = User::find($id);
        $roles = Roles::pluck("rol", "id");
        return view("usuarios.editar",compact("usuario", "roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $usuario = User::find($id);
        try{
            $usuario->name = $request->input("usuario");
            $usuario->email = $request->input("email");
            $usuario->rol_id = $request->input("rol_id");
            if($request->input("password") != ""){
                $usuario->password = bcrypt($request->input("password"));
            }
            $usuario->save();
            
            Session::flash("message-ok","El usuario ha sido actualizado!");
        } catch (Exception $ex) {
            Session::flash("message-error","Error al crear el usuario: ".$ex->getMessage());
        }
        
        return Redirect::to("/usuarios");
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
            $usuario = User::find($id);
            $usuario->delete();
            
            Session::flash("mensaje-ok","El registro ha sido eliminado!");
        }catch(Exception $ex){
            Session::flash("message-error","Error al intentar eliminar el registro: ".$ex->getMessage());
        }
        
        return Redirect::to("/usuarios");
    }
}
