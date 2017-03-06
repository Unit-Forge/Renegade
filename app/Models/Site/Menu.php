<?php

namespace Renegade\Models\Site;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * @package Renegade\Models\Site
 */
class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuItems()
    {
        return $this->hasMany('Renegade\Models\Site\MenuItem');
    }
}
