<?php

namespace Renegade\Repositories\API\Site;

use Renegade\Events\API\Unit\RankCreated;
use Renegade\Models\Access\User\User;
use Renegade\Models\Site\Menu;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuRepository.
 */
class MenuRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Menu::class;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMenus()
    {
        $menus = Menu::all();
        return response()->json($menus->toArray());
    }

    /**
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($input)
    {
        $menu = Menu::create($input);
        return response()->json($menu->toArray(),201);
    }

    /**
     * @param Model $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Model $menu)
    {
        return response()->json($menu->toArray(),200);
    }

    /**
     * @param Model $menu
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $menu, array $input)
    {
        if($menu->update($input))
        {
            return response()->json($menu->toArray(),200);
        } else {
            return response()->json(['error' => trans('exceptions.api.ranks.update_error')],404);
        }
    }

    /**
     * @param Model $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $menu)
    {
        if($menu->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exceptions.api.ranks.delete_error')],404);
        }
    }

}
