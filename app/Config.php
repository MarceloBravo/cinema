<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $imagen_portada
 * @property int $user_id
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class Config extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'config';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [
        'imagen_portada',
        'nombre_pelicula_portada',
        'censura_pelicula_portada',
        'director_pelicula_portada',
        'calificacion_pelicula_portada',
        'fecha_pelicula_portada',
        'resena_pelicula_portada',
        'genre_id',
        'user_id', 
        'nombre_app',
        'imagen_app',
        'footer_title',
        'footer_text',
        'footer_text2',
        'titulo1',
        'titulo2',
        'titulo3',
        'titulo4',
        'deleted_at', 
        'created_at', 
        'updated_at'];
    
    
    public function setImagenPortadaAttribute($value){
        if(isset($value)){
            //$name = Carbon::now()->second.$value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            $name = $value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            \Storage::disk('local')->put($name, \File::get($value));   //Guarda el archivo en la carpeta afiche (ver config/filesystems.php)
            $this->attributes['imagen_portada'] = $name;    //Guarda en el campo afiche el el nombnre del archivo sin su ruta
        }
    }
    
    public function setImagenAppAttribute($value){
        if(isset($value)){
            //$name = Carbon::now()->second.$value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            $name = $value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            \Storage::disk('appImages')->put($name, \File::get($value));   //Guarda el archivo en la carpeta afiche (ver config/filesystems.php)
            $this->attributes['imagen_app'] = $name;    //Guarda en el campo afiche el el nombnre del archivo sin su ruta
        }
    }

}
