<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $user_id
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class GeneroMusical extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'generos_musicales';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'user_id', 'deleted_at', 'created_at', 'updated_at'];

}
