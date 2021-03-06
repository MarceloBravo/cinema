<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property integer $id
 * @property string $rol
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Roles extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
    protected $dates = ['deleted_at'];
    /**
     * @var array
     */
    protected $fillable = ['rol', 'created_at', 'updated_at', 'deleted_at'];


    public static function filtrar($criterio){
        return DB::select("SELECT id, rol FROM roles WHERE rol LIKE :criterio", ["criterio"=>'%'.$criterio.'%']);
    }

}
