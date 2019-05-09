<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol_id', 'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
    public function setFotoAttribute($value){
        if(isset($value)){
            //$name = Carbon::now()->second.$value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            $name = $value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            \Storage::disk('appImages')->put($name, \File::get($value));   //Guarda el archivo en la carpeta afiche (ver config/filesystems.php)
            $this->attributes['foto'] = $name;    //Guarda en el campo afiche el el nombnre del archivo sin su ruta
        }
    }
}
