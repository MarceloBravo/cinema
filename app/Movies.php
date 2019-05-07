<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//use Carbon\Carbon;
/**
 * @property integer $id
 * @property string $nombre
 * @property string $reparto
 * @property string $director
 * @property string $duracion
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class Movies extends Model
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
    protected $fillable = ['nombre', 'afiche', 'reparto', 'director', 'duracion', 'triller', 'fecha', 'resumen', 'genre_id', 'user_id', 'created_at', 'updated_at'];

        /*
    public static function setPathAttribute($path){
        $name = "";
        if(!empty($path)){
            $name = Carbon::now()->second.$path->getClientOriginalName();
            //$this->attributes['afiche'] = $name;    //Asigna automáticamente el nombre al cargar los datos en el controlador, con la función fill($request->all())
            \Storage::disk('local')->put($name, \File::get($path));            
        }
        return $name;   //En el caso de no cargar los datos con la función fill($request->all()), se debuelve el nombre generado para el archivo.
    }
     */
    
    public static function getAllMovies(){
        return DB::Table('movies')
                ->join('genres','genres.id','=','movies.genre_id')
                ->select('movies.*','genres.genero')
                ->paginate(15);
    }
    
    public static function filtro($criterio){
        return DB::select("SELECT m.id, m.nombre, m.director, m.duracion, m.afiche, g.genero "
                . "FROM movies m "
                . "INNER JOIN genres g ON m.genre_id = g.id "
                . "WHERE "
                . "CONCAT(m.nombre, ' ', m.duracion, ' ', g.genero) "
                . "LIKE :criterio",["criterio"=>'%'.$criterio.'%']);
    }
    
    public function setAficheAttribute($value) {
        if(isset($value)){
            //$name = Carbon::now()->second.$value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            $name = $value->getClientOriginalName();  //antenpone el segundo actual alnombre del campo para evitar que sobreescriba el archivo
            \Storage::disk('local')->put($name, \File::get($value));   //Guarda el archivo en la carpeta afiche (ver config/filesystems.php)
            $this->attributes['afiche'] = $name;    //Guarda en el campo afiche el el nombnre del archivo sin su ruta
        }
    }
    
    
}
