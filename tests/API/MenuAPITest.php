<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuAPITest extends TestCase
{
    /**
     * @group menus-api
     * Tests getting all menus
     */
    public function testGetMenus()
    {
        $menu1 = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);
        $menu2 = \Renegade\Models\Site\Menu::create(['name'=>'Backend']);


        $this
            ->json('GET','api/site/menus')
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Backend',
            ]);
    }

    /**
     * @group menus-api
     * Tests getting one menu
     */
    public function testGetMenu()
    {
        $menu = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);

        $this
            ->json('GET','api/site/menus/'.$menu->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Frontend',
            ]);
    }

    /**
     * @group menus-api
     * Tests creating a menu - no authentication
     */
    public function testCreatingMenu()
    {

        $this
            ->json('POST','api/site/menus',['name' => 'Menu Test'])
            ->assertResponseStatus(201)
            ->seeJson([
                'name' => 'Menu Test',
            ]);
    }


    /**
     * @group menus-api
     * Tests updating a menu
     */
    public function testUpdateRank()
    {
        // Create a Rank
        $menu = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);

        $this
            ->json('PUT','api/site/menus/'.$menu->id,['name' => 'Menu Change'])
            ->assertResponseStatus(200)
            ->seeJson([
                'name' => 'Menu Change',
            ]);
    }

    /**
     * @group menus-api
     * Tests deleting a menu
     */
    public function testDeleteRank()
    {
        // Create a Rank
        $menu = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);

        $this
            ->json('DELETE','api/site/menus/'.$menu->id)
            ->assertResponseStatus(204);
    }


}
