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
    protected $fillable = ['name', 'teamspeak_id', 'next_rank_id','order'];
}
