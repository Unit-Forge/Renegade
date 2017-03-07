<?php

namespace Renegade\Http\Controllers\API\Site;

use Illuminate\Http\Request;
use Renegade\Http\Controllers\Controller;
use Renegade\Http\Requests\API\Site\Post\CreatePostRequest;
use Renegade\Http\Requests\API\Site\Post\DeletePostRequest;
use Renegade\Http\Requests\API\Site\Post\UpdatePostRequest;
use Renegade\Models\Site\Category;
use Renegade\Models\Site\Post;
use Renegade\Repositories\API\Site\PostRepository;

class PostController extends Controller
{
    /**
     * @var $menuItem
     */
    protected $posts;

    /**
     * MenuItemController constructor.
     * @param PostRepository $posts
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($category)
    {
        $category = Category::findOrFail($category);
        return $this->posts->getAllPosts($category);
    }

    /**
     * @param $category
     * @param $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($category, $post)
    {
        $post = Post::findOrFail($post);
        return $this->posts->show($post);
    }

    /**
     * @param $category
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($category, CreatePostRequest $request)
    {
        $category = Category::findOrFail($category);
        return $this->posts->create($category,$request->all());
    }

    /**
     * @param $category
     * @param $post
     * @param UpdatePostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($category, $post, UpdatePostRequest $request)
    {
        $post = Post::findOrFail($post);
        return $this->posts->update($post,$request->all());
    }

    /**
     * @param $category
     * @param $post
     * @param DeletePostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($category, $post, DeletePostRequest $request)
    {
        $post = Post::findOrFail($post);
        return $this->posts->delete($post);
    }
}
