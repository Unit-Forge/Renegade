<?php

namespace Renegade\Http\Controllers\API\Site;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Site\Category\CreateCategoryRequest;
use Renegade\Http\Requests\API\Site\Category\DeleteCategoryRequest;
use Renegade\Http\Requests\API\Site\Category\UpdateCategoryRequest;
use Renegade\Models\Site\Category;
use Renegade\Repositories\API\Site\CategoryRepository;

/**
 * Class CategoryController
 * @package Renegade\Http\Controllers\API\Site
 */
class CategoryController extends Controller
{
    /**
     * @var $category
     */
    protected $category;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->category->getAllCategories();
    }

    /**
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateCategoryRequest $request)
    {
        return $this->category->create($request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return $this->category->show($category);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        return $this->category->update($category, $request->all());
    }

    /**
     * @param DeleteCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        return $this->category->delete($category, $request->all());
    }
}
