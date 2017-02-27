<?php

namespace Renegade\Repositories\API\Auth;

use Renegade\Events\API\Unit\RankCreated;
use Renegade\Models\Access\User\User;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class UserRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = User::class;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json($users->toArray());
    }

    /**
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($input)
    {
        $user = User::create($input);
        return response()->json($user->toArray(),201);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user->toArray(),200);
    }

    /**
     * @param Model $user
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $user, array $input)
    {
        if($user->update($input))
        {
            return response()->json($user->toArray(),200);
        } else {
            return response()->json(['error' => trans('exception.users.update_error')],404);
        }
    }

    /**
     * @param Model $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $user)
    {
        if($user->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exception.users.delete_error')],404);
        }
    }

}
