<?php

namespace Renegade\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id','order','name','slug'];

    /**
     * @var array
     */
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function posts()
    {
        return $this->hasMany('Renegade\Models\Site\Post')->orderBy('created_at', 'DESC');
    }
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
