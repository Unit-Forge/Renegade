<?php

namespace Renegade\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany('Renegade\Models\Site\Post')->orderBy('created_at', 'DESC');
    }
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
