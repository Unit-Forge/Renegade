<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryAPITest extends TestCase
{
    /**
     * @group sites-categories-api
     * Tests getting all category
     */
    public function testGetCategories()
    {
        $category1 = \Renegade\Models\Site\Category::create(['name' => 'News', 'slug' => 'news']);
        $category2 = \Renegade\Models\Site\Category::create(['name' => 'Update', 'slug' => 'update']);

        $this
            ->json('GET','api/site/categories')
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Update',
            ]);
    }

    /**
     * @group sites-categories-api
     * Tests getting one category
     */
    public function testGetCategory()
    {
        $category = \Renegade\Models\Site\Category::create(['name' => 'News', 'slug' => 'news']);

        $this
            ->json('GET','api/site/categories/'.$category->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'News',
            ]);
    }

    /**
     * @group sites-categories-api
     * Tests creating a category - no authentication
     */
    public function testCreatingCategory()
    {

        $this
            ->json('POST','api/site/categories',['name' => 'News', 'slug' => 'news'])
            ->assertResponseStatus(201)
            ->seeJson([
                'name' => 'News',
            ]);
    }


    /**
     * @group sites-categories-api
     * Tests updating a category
     */
    public function testUpdateCategory()
    {
        // Create a Category
        $category = \Renegade\Models\Site\Category::create(['name' => 'News', 'slug' => 'news']);

        $this
            ->json('PUT','api/site/categories/'.$category->id,['name' => 'News Stuff'])
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'News Stuff',
            ]);
    }

    /**
     * @group sites-categories-api
     * Tests deleting a category
     */
    public function testDeleteCategory()
    {
        // Create a Category
        $category = \Renegade\Models\Site\Category::create(['name' => 'News', 'slug' => 'news']);

        $this
            ->json('DELETE','api/site/categories/'.$category->id)
            ->assertResponseStatus(204);
    }


}
