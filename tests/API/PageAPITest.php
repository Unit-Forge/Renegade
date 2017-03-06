<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageAPITest extends TestCase
{
    /**
     * @group sites-pages-api
     * Tests getting all page
     */
    public function testGetPages()
    {
        $page1 = \Renegade\Models\Site\Page::create(['title' => 'News', 'slug' => 'news']);
        $page2 = \Renegade\Models\Site\Page::create(['title' => 'Update', 'slug' => 'update']);

        $this
            ->json('GET','api/site/pages')
            ->assertResponseStatus(200)
            ->seeJson([
                'title' => 'Update',
            ]);
    }

    /**
     * @group sites-pages-api
     * Tests getting one page
     */
    public function testGetPage()
    {
        $page = \Renegade\Models\Site\Page::create(['title' => 'News', 'slug' => 'news']);

        $this
            ->json('GET','api/site/pages/'.$page->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'title' => 'News',
            ]);
    }

    /**
     * @group sites-pages-api
     * Tests creating a page - no authentication
     */
    public function testCreatingPage()
    {

        $this
            ->json('POST','api/site/pages',['title' => 'News', 'slug' => 'news'])
            ->assertResponseStatus(201)
            ->seeJson([
                'title' => 'News',
            ]);
    }


    /**
     * @group sites-pages-api
     * Tests updating a page
     */
    public function testUpdatePage()
    {
        // Create a Page
        $page = \Renegade\Models\Site\Page::create(['title' => 'News', 'slug' => 'news']);

        $this
            ->json('PUT','api/site/pages/'.$page->id,['title' => 'News Stuff'])
            ->assertResponseStatus(200)
            ->seeJson([
                'title' => 'News Stuff',
            ]);
    }

    /**
     * @group sites-pages-api
     * Tests deleting a page
     */
    public function testDeletePage()
    {
        // Create a Page
        $page = \Renegade\Models\Site\Page::create(['title' => 'News', 'slug' => 'news']);

        $this
            ->json('DELETE','api/site/pages/'.$page->id)
            ->assertResponseStatus(204);
    }


}
