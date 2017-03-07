<?php

namespace Renegade\Repositories\API\Site;


use Renegade\Models\Site\Post;
use Renegade\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Renegade\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PostRepository.
 */
class PostRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Post::class;

    /**
     * @param Model $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPosts(Model $category)
    {
        $posts = $category->posts;
        return response()->json($posts->toArray(),200);
    }

    /**
     * @param Model $category
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Model $category, $input)
    {
        return response()->json($category->posts()->create($input)->toArray(),201);
    }

    /**
     * @param Model $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Model $post)
    {
        return response()->json($post->toArray(),200);
    }

    /**
     * @param Model $post
     * @param array $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Model $post, array $input)
    {
        if($post->update($input))
        {
            return response()->json($post->toArray(),200);
        } else {
            return response()->json(['error' => trans('exceptions.api.users.teamspeak.update_error')],404);
        }
    }

    /**
     * @param Model $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Model $post)
    {
        if($post->delete())
        {
            return response()->json([],204);
        } else {
            return response()->json(['error' => trans('exceptions.api.users.teamspeak.delete_error')],404);
        }
    }

}
