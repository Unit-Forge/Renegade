<?php

namespace Renegade\Repositories\API\Unit;

use Renegade\Models\Access\User\User;
use Renegade\Models\Unit\Rank;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class RankRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Rank::class;

    public function getAllRanks()
    {
        $ranks = Rank::all();
        return response()->json($ranks->toArray());
    }

}
