<?php

namespace Renegade\Repositories\API\Site;

use Renegade\Events\API\Unit\RankCreated;
use Renegade\Models\Access\User\User;
use Renegade\Models\Site\Menu;
use Renegade\Models\Site\MenuItem;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuItemRepository.
 */
class MenuItemRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = MenuItem::class;

    /**
     * @param Model $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMenuItem(Model $menu)
    {
        $menuitems = $menu->menuItems;
        return response()->json($menuitems->toArray(),200);
    }

    /**
     * @param Model $menu
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Model $menu, $input)
    {
        return response()->json($menu->menuItems()->create($input)->toArray(),201);
    }

    /**
     * @param Model $menuItem
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Model $menuItem)
    {
        return response()->json($menuItem->toArray(),200);
    }

    /**
     * @param Model $menuItem
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $menuItem, array $input)
    {
        if($menuItem->update($input))
        {
            return response()->json($menuItem->toArray(),200);
        } else {
            return response()->json(['error' => trans('exceptions.api.users.teamspeak.update_error')],404);
        }
    }

    /**
     * @param Model $menuItem
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $menuItem)
    {
        if($menuItem->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exceptions.api.users.teamspeak.delete_error')],404);
        }
    }

}
