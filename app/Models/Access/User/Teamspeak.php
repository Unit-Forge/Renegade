<?php

namespace Renegade\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teamspeak
 * @package Renegade\Models\Access\User
 */
class Teamspeak extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid','description'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Renegade\Models\Access\User\User');
    }
}
