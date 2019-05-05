<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    protected $fillable = ['nombre', 'afiche', 'reparto', 'director', 'duracion', 'user_id', 'created_at', 'updated_at'];

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
}
