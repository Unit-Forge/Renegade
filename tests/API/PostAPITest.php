<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostAPITest extends TestCase
{
    /**
     * @group sites-posts-api
     * Tests getting all posts under a specific category
     */
    public function testGetPosts()
    {
        $category = \Renegade\Models\Site\Category::create(['name'=>'News', 'slug' => 'news']);
        $category->posts()->create([
            'author_id' => 1,
            'title' => 'Test Post',
            'excerpt' => 'excerpt test',
            'body' => 'body test',
            'slug' => 'slug-test',
        ]);

        $category->posts()->create([
            'author_id' => 1,
            'title' => 'Test Post 2',
            'excerpt' => 'excerpt test',
            'body' => 'body test',
            'slug' => 'slug-test-2',

        ]);

        $this
            ->json('GET','api/site/categories/'.$category->id.'/posts')
            ->assertResponseStatus(200)
            ->seeJson([
                'title' => 'Test Post 2',
            ]);
    }

    /**
     * @group sites-posts-api
     * Tests getting one Post from a category
     */
    public function testGetPost()
    {
        $category = \Renegade\Models\Site\Category::create(['name'=>'News', 'slug' => 'news']);
        $post = $category->posts()->create([
            'author_id' => 1,
            'title' => 'Test Post',
            'excerpt' => 'excerpt test',
            'body' => 'body test',
            'slug' => 'slug-test',
        ]);
        $this
            ->json('GET','api/site/categories/'.$category->id.'/posts/'.$post->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'title' => 'Test Post',
            ]);
    }

    /**
     * @group sites-posts-api
     * Tests creating a post - no authentication
     */
    public function testCreatingPost()
    {
        $category = \Renegade\Models\Site\Category::create(['name'=>'News', 'slug' => 'news']);
        $this
            ->json('POST','api/site/categories/'.$category->id.'/posts',[
                'author_id' => 1,
                'title' => 'Test Post 2',
                'excerpt' => 'excerpt test',
                'body' => 'body test',
                'slug' => 'slug-test',
            ])
            ->assertResponseStatus(201)
            ->seeJson([
                'title' => 'Test Post 2',
            ]);
    }


    /**
     * @group sites-posts-api
     * Tests updating a post
     */
    public function testUpdatePost()
    {
        $category = \Renegade\Models\Site\Category::create(['name'=>'News', 'slug' => 'news']);
        $post = $category->posts()->create([
            'author_id' => 1,
            'title' => 'Test Post',
            'excerpt' => 'excerpt test',
            'body' => 'body test',
            'slug' => 'slug-test',
        ]);
        $this
            ->json('PUT', 'api/site/categories/'.$category->id.'/posts/'.$post->id,['title' => 'Test Change'])
            ->assertResponseStatus(200)
            ->seeJson([
                'title' => 'Test Change',
            ]);
    }

    /**
     * @group sites-posts-api
     * Tests deleting a menu items
     */
    public function testDeleteRank()
    {
        $category = \Renegade\Models\Site\Category::create(['name'=>'News', 'slug' => 'news']);
        $post = $category->posts()->create([
            'author_id' => 1,
            'title' => 'Test Post',
            'excerpt' => 'excerpt test',
            'body' => 'body test',
            'slug' => 'slug-test',
        ]);
        $this
            ->json('DELETE','api/site/categories/'.$category->id.'/posts/'.$post->id)
            ->assertResponseStatus(204);
    }


}
