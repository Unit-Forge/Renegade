<?php

namespace Renegade\Repositories\API\Auth\User;

use Renegade\Models\Access\User\Teamspeak;
use Renegade\Models\Access\User\User;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamspeakRepository.
 */
class TeamspeakRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Teamspeak::class;

    /**
     * @param Model $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllTeamspeaks(Model $user)
    {
        $teamspeaks = $user->teamspeak;
        return response()->json($teamspeaks->toArray(),200);
    }

    /**
     * @param Model $user
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Model $user, $input)
    {
        return response()->json($user->teamspeak()->create($input)->toArray(),201);
    }

    /**
     * @param Model $teamspeak
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Model $teamspeak)
    {
        return response()->json($teamspeak->toArray(),200);
    }

    /**
     * @param Model $teamspeak
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $teamspeak, array $input)
    {
        if($teamspeak->update($input))
        {
            return response()->json($teamspeak->toArray(),200);
        } else {
            return response()->json(['error' => trans('exceptions.api.users.teamspeak.update_error')],404);
        }
    }

    /**
     * @param Model $teamspeak
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $teamspeak)
    {
        if($teamspeak->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exceptions.api.users.teamspeak.delete_error')],404);
        }
    }

}
