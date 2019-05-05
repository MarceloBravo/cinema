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
        'deleted_at', 
        'created_at', 
        'updated_at'];

}
