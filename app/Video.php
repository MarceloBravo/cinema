<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $url
 * @property int $user_id
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property string $imagen
 * @property int $genero_id
 * @property string $artista
 * @property string $fecha_lanzamiento
 */
class Video extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'url', 'user_id', 'deleted_at', 'created_at', 'updated_at', 'imagen', 'genero_id', 'artista', 'fecha_lanzamiento'];

    
    public static function filtro($criterio){
        return DB::select("SELECT v.id, v.nombre, v.descripcion, v.url, v.imagen, v.artista, v.fecha_lanzamiento, g.nombre as genero "
                . "FROM videos v "
                . "INNER JOIN generos_musicales g ON v.genero_id = g.id "
                . "WHERE "
                . "CONCAT(v.nombre, ' ', g.nombre ) "
                . "LIKE :criterio",["criterio"=>'%'.$criterio.'%']);
    }
    
    public function setImagenAttribute($value) {
        if(isset($value)){
            //$name = Carbon::now()->second.$value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            $name = $value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            \Storage::disk('videos')->put($name, \File::get($value));   //Guarda el archivo en la carpeta afiche (ver config/filesystems.php)
            $this->attributes['imagen'] = $name;    //Guarda en el campo afiche el el nombnre del archivo sin su ruta
        }
    }
}
