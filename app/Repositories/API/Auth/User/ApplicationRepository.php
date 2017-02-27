<?php

namespace Renegade\Repositories\API\Auth\User;

use Renegade\Models\Access\User\Application;
use Renegade\Models\Access\User\User;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ApplicationRepository.
 */
class ApplicationRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Application::class;

    /**
     * @param Model $user
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Model $user, $input)
    {
        return response()->json($user->application()->create($input)->toArray(),201);
    }

    /**
    /**
     * @param Model $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Model $user)
    {
        $application = $user->application;
        // Deal with misssing application
        if(!isset($application))
            return response()->json(['error' => trans('exceptions.api.users.application.not_found')],404);

        return response()->json($application->toArray(),200);
    }

    /**
     * @param Model $user
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $user, array $input)
    {
        if($user->application()->update($input))
        {
            return response()->json($user->application->toArray(),200);
        } else {
            return response()->json(['error' => trans('exceptions.api.users.application.update_error')],404);
        }
    }

    /**
     * @param Model $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $user)
    {
        if($user->application()->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exceptions.api.users.application.delete_error')],404);
        }
    }

}
