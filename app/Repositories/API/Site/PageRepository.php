<?php

namespace Renegade\Repositories\API\Site;

use Renegade\Events\API\Site\PageCreated;
use Renegade\Models\Access\User\User;
use Renegade\Models\Site\Page;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PageRepository.
 */
class PageRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Page::class;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPages()
    {
        $pages = Page::all();
        return response()->json($pages->toArray());
    }

    /**
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($input)
    {
        $page = Page::create($input);
        return response()->json($page->toArray(),201);
    }

    /**
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($page)
    {
        return response()->json($page->toArray(),200);
    }

    /**
     * @param Model $page
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $page, array $input)
    {
        if($page->update($input))
        {
            return response()->json($page->toArray(),200);
        } else {
            return response()->json(['error' => trans('exceptions.api.pages.update_error')],404);
        }
    }

    /**
     * @param Model $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $page)
    {
        if($page->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exceptions.api.pages.delete_error')],404);
        }
    }

}
