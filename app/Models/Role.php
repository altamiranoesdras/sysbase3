<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version January 30, 2020, 4:01 pm CST
 *
 * @property \App\Models\ModelHasRole modelHasRole
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property string name
 * @property string guard_name
 */
class Role extends \Spatie\Permission\Models\Role
{

    public $table = 'roles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const DEVELOPER =   'Developer';
    const SUPERADMIN =  'Superadmin';
    const ADMIN =       'Admin';
    const EMPLEADO =    'Empleado';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'guard_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'guard_name' => 'required'
    ];


}
