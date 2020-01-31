<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Configuration
 * @package App\Models
 * @version January 31, 2020, 10:57 am CST
 *
 * @property string key
 * @property string value
 * @property string descripcion
 */
class Configuration extends Model
{
    use SoftDeletes;

    public $table = 'configurations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'key',
        'value',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'value' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key' => 'required',
        'value' => 'required',
        'descripcion' => 'required'
    ];

    
}
