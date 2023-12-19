<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Configuration
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration withoutTrashed()
 * @mixin \Eloquent
 */
class Configuration extends Model implements HasMedia
{
    use SoftDeletes,InteractsWithMedia;

    public $table = 'configurations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const LOGO =  1;
    const ICONO = 2;
    const FONDO_LOGIN = 3;


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


    /**
     * @return \App\Models\Media
     */
    public function getMediaLogo()
    {
        return $this->getMedia('logo')->first();
    }

    public function getMediaFondoLogin()
    {
        return $this->getMedia('fondo_login')->first();
    }


    /**
     * @return \App\Models\Media
     */
    public function getMediaIcono()
    {
        return $this->getMedia('icono')->first();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('512x512')
            ->width(512)
            ->height(512)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');

        $this->addMediaConversion('192x192')
            ->width(192)
            ->height(192)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');

        $this->addMediaConversion('180x180')
            ->width(180)
            ->height(180)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');

        $this->addMediaConversion('152x152')
            ->width(152)
            ->height(152)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');

        $this->addMediaConversion('144x144')
            ->width(144)
            ->height(144)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');

        $this->addMediaConversion('128x128')
            ->width(128)
            ->height(128)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');

        $this->addMediaConversion('120x120')
            ->width(120)
            ->height(120)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');


        $this->addMediaConversion('114x114')
            ->width(114)
            ->height(114)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');


        $this->addMediaConversion('76x76')
            ->width(76)
            ->height(76)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');


        $this->addMediaConversion('72x72')
            ->width(72)
            ->height(72)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');



        $this->addMediaConversion('60x60')
            ->width(60)
            ->height(60)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');


        $this->addMediaConversion('57x57')
            ->width(57)
            ->height(57)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');



        $this->addMediaConversion('16x16')
            ->width(16)
            ->height(16)
            ->format(Manipulations::FORMAT_PNG)
            ->performOnCollections('icono');


        $this->addMediaConversion('webp')
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('fondo_login');

        $this->addMediaConversion('webp')
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('logo');



    }

    public function puedeEliminar()
    {
        return $this->id!=self::LOGO && $this->id!=self::ICONO;
    }
}
