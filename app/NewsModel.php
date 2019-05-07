<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property integer $id
 * @property string $titulo
 * @property string $noticia
 * @property string $imagen
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class NewsModel extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'news';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['titulo', 'noticia', 'imagen', 'user_id', 'created_at', 'updated_at', 'deleted_at'];

    public static function filtrar($criterio){
        
        return  DB::select("SELECT id, titulo, fecha, noticia, imagen FROM news "
                . "WHERE "
                . "CONCAT(titulo, ' ', CAST(fecha AS CHAR(10)), ' ', noticia) "
                . "LIKE :criterio", ["criterio"=>'%'.$criterio.'%']);
        
    } 
}
