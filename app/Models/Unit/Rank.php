<?php

namespace Renegade\Models\Unit;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','order','next_rank_id','teamspeak_id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

}
