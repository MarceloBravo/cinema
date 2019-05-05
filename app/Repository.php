<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $archivo
 * @property string $ruta
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Repository extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'repository';

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
    protected $fillable = ['archivo', 'ruta', 'created_at', 'updated_at', 'deleted_at'];

}
