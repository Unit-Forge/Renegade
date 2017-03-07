<?php

namespace Renegade\Http\Controllers\API\Site;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Site\Menu\CreateMenuRequest;
use Renegade\Http\Requests\API\Site\MenuItem\CreateMenuItemRequest;
use Renegade\Http\Requests\API\Site\MenuItem\DeleteMenuItemRequest;
use Renegade\Http\Requests\API\Site\MenuItem\UpdateMenuItemRequest;
use Renegade\Models\Site\Menu;
use Renegade\Models\Site\MenuItem;
use Renegade\Repositories\API\Site\MenuItemRepository;

/**
 * Class MenuItemController
 * @package Renegade\Http\Controllers\API\Site
 */
class MenuItemController extends Controller
{
    /**
     * @var $menuItem
     */
    protected $menuItem;

    /**
     * MenuItemController constructor.
     * @param MenuItemRepository $menuItem
     */
    public function __construct(MenuItemRepository $menuItem)
    {
        $this->menuItem = $menuItem;
    }

    /**
     * @param $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($menu)
    {
        $menu = Menu::findOrFail($menu);
        return $this->menuItem->getAllMenuItem($menu);
    }

    /**
     * @param $menu
     * @param $menuitem
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($menu, $menuitem)
    {
        $menuItem = MenuItem::findOrFail($menuitem);
        return $this->menuItem->show($menuItem);
    }

    /**
     * @param $menu
     * @param CreateMenuItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($menu, CreateMenuItemRequest $request)
    {
        $menu = Menu::findOrFail($menu);
        return $this->menuItem->create($menu,$request->all());
    }

    /**
     * @param $menu
     * @param $menuitem
     * @param UpdateMenuItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($menu, $menuitem, UpdateMenuItemRequest $request)
    {
        $menuItem = MenuItem::findOrFail($menuitem);
        return $this->menuItem->update($menuItem,$request->all());
    }

    /**
     * @param $menu
     * @param $menuitem
     * @param DeleteMenuItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($menu, $menuitem, DeleteMenuItemRequest $request)
    {
        $menuItem = MenuItem::findOrFail($menuitem);
        return $this->menuItem->delete($menuItem);
    }
}
