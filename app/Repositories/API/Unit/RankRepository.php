<?php

namespace Renegade\Repositories\API\Unit;

use Renegade\Events\API\Unit\RankCreated;
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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllRanks()
    {
        $ranks = Rank::all();
        return response()->json($ranks->toArray());
    }

    /**
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($input)
    {
        $rank = Rank::create($input);
        return response()->json($rank->toArray(),201);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $rank = Rank::findOrFail($id);
        return response()->json($rank->toArray(),200);
    }

    /**
     * @param Model $rank
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $rank, array $input)
    {
        if($rank->update($input))
        {
            return response()->json($rank->toArray(),200);
        } else {
            return response()->json(['error' => trans('exceptions.api.ranks.update_error')],404);
        }
    }

    /**
     * @param Model $rank
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $rank)
    {
        if($rank->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exceptions.api.ranks.delete_error')],404);
        }
    }

}
