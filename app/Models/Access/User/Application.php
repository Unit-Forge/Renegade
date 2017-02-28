<?php

namespace Renegade\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Application
 * @package Renegade\Models\Access\User
 */
class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['application','status'];

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
