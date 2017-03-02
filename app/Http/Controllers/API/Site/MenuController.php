<?php

namespace Renegade\Http\Controllers\API\Site;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Site\Menu\CreateMenuRequest;
use Renegade\Http\Requests\API\Site\Menu\DeleteMenuRequest;
use Renegade\Http\Requests\API\Site\Menu\UpdateMenuRequest;
use Renegade\Models\Site\Menu;
use Renegade\Repositories\API\Site\MenuRepository;

class MenuController extends Controller
{
    /**
     * @var $menus
     */
    protected $menus;

    /**
     * MenuController constructor.
     * @param MenuRepository $menus
     */
    public function __construct(MenuRepository $menus)
    {
        $this->menus = $menus;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->menus->getAllMenus();
    }

    /**
     * @param CreateMenuRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateMenuRequest $request)
    {
        return $this->menus->create($request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return $this->menus->show($menu);
    }

    /**
     * @param UpdateMenuRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateMenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);
        return $this->menus->update($menu, $request->all());
    }

    /**
     * @param DeleteMenuRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteMenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);
        return $this->menus->delete($menu, $request->all());
    }
}
