<?php

namespace Renegade\Repositories\API\Site;

use Renegade\Events\API\Site\CategoryCreated;
use Renegade\Models\Access\User\User;
use Renegade\Models\Site\Category;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Category::class;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCategories()
    {
        $categories = Category::all();
        return response()->json($categories->toArray());
    }

    /**
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($input)
    {
        $category = Category::create($input);
        return response()->json($category->toArray(),201);
    }

    /**
     * @param $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($category)
    {
        return response()->json($category->toArray(),200);
    }

    /**
     * @param Model $category
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $category, array $input)
    {
        if($category->update($input))
        {
            return response()->json($category->toArray(),200);
        } else {
            return response()->json(['error' => trans('exceptions.api.categories.update_error')],404);
        }
    }

    /**
     * @param Model $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $category)
    {
        if($category->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exceptions.api.categories.delete_error')],404);
        }
    }

}
