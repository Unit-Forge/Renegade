<?php

namespace Renegade\Models\Access\User;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Renegade\Models\Access\User\Traits\UserAccess;
use Illuminate\Database\Eloquent\SoftDeletes;
use Renegade\Models\Access\User\Traits\Scope\UserScope;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Renegade\Models\Access\User\Traits\UserSendPasswordReset;
use Renegade\Models\Access\User\Traits\Attribute\UserAttribute;
use Renegade\Models\Access\User\Traits\Relationship\UserRelationship;
use Cmgmyr\Messenger\Traits\Messagable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class User.
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens,
        UserScope,
        UserAccess,
        Notifiable,
        SoftDeletes,
        UserAttribute,
        UserRelationship,
        UserSendPasswordReset,
        HasMediaTrait,
        Messagable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status', 'confirmation_code', 'confirmed'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.users_table');
    }

    /**
     * One to One Relationship for Application
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function application()
    {
        return $this->hasOne('Renegade\Models\Access\User\Application');
    }

    /**
     * One to Many Relationship for Teamspeak models
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamspeak()
    {
        return $this->hasMany('Renegade\Models\Access\User\Teamspeak');
    }

    public function getAvatar()
    {

        if($this->getMedia('profile')->count() > 0)
        {
            return $this->getMedia('profile')->first()->getUrl();
        }
        return '/img/user-default.png';
    }
}
