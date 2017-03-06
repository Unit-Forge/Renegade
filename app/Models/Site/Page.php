<?php

namespace Renegade\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','excerpt','body','slug','meta_description','meta_keywords','status'];
    /**
     * @var array
     */
    protected $dates = ['created_at','updated_at','deleted_at'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo('Renegade\Models\Site\Menu');
    }
}
