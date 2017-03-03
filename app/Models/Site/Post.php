<?php

namespace Renegade\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author_id', 'category_id','title','seo_title','excerpt','body','meta_description','meta_keywords','status'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('Renegade\Models\Site\Category');
    }
}
