<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $username
 * @property string $name
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $provider
 * @property string|null $provider_uid
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read mixed $img
 * @property-read mixed $thumb
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Option> $options
 * @property-read int|null $options_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Option> $shortcuts
 * @property-read int|null $shortcuts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable implements  MustVerifyEmail,HasMedia
{
    use HasApiTokens,Notifiable,InteractsWithMedia,HasRoles,SoftDeletes,HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','provider','provider_uid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['options.children'];

    public function getImgAttribute()
    {
        $media = $this->getMedia('avatars')->last();
        return $media ? $media->getUrl() : asset('dist/img/avatar5.png');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'username' => 'sometimes|required|max:255|unique:users',
        'email'    => 'sometimes|required|email|max:255|unique:users',
        'password' => 'required|min:6',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function options()
    {
        return $this->belongsToMany(\App\Models\Option::class, 'option_user');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    public function getThumbAttribute()
    {
        $media = $this->getMedia('avatars')->last();
        return $media ? $media->getUrl('thumb') : asset('dist/img/avatar5.png');
    }

    public function shortcuts()
    {
        return $this->belongsToMany(Option::class,'user_shortcuts','user_id','option_id')
            ->withPivot('orden');
    }

    public function getAllOptions()
    {
        $opcionesDirectas = $this->options;

        $opcionesPorRol = collect();


        /**
         * @var Role $role
         */
        foreach ($this->roles as $index => $role) {
            $opcionesPorRol = $opcionesPorRol->merge($role->options);
        }

        $allOptions = $opcionesDirectas->merge($opcionesPorRol);


//        dd($this->id,$opcionesDirectas->toArray(),$opcionesPorRol->toArray(),$allOptions->toArray());

        return $allOptions;
    }


}
