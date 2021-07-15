<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Configuration
 * @package App\Models
 * @version February 14, 2019, 3:40 pm CST
 *
 * @property string key
 * @property string value
 * @property string descripcion
 */
class Configuration extends Model implements HasMedia
{
    use SoftDeletes,InteractsWithMedia;

    public $table = 'configurations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'key',
        'value',
        'descripcion',
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
        'key' => 'required|unique:configurations',
        'value' => 'required',
        'descripcion' => 'required'
    ];



    public function getImgAttribute()
    {
        $media = $this->getMedia('logo')->first();
        return $media ? $media->getUrl() : asset('img/default.svg');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200);
    }

    public function getThumbAttribute()
    {
        $media = $this->getMedia('logo')->first();
        return $media ? $media->getUrl('thumb') : asset('img/default.svg');
    }

}
