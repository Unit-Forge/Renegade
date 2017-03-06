<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuItemAPITest extends TestCase
{
    /**
     * @group menus-items-api
     * Tests getting all menuItems
     */
    public function testGetMenusItem()
    {
        $menu = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);
        $menu->menuItems()->create([
            'title' => 'Test',
            'url' => 'http://google.com',
            'order' => 1
        ]);

        $menu->menuItems()->create([
            'title' => 'Test 2',
            'url' => 'http://google1.com',
            'order' => 1
        ]);


        $this
            ->json('GET','api/site/menus/'.$menu->id.'/menu-item')
            ->assertResponseStatus(200)
            ->seeJson([
                'url' => 'http://google1.com',
            ]);
    }

    /**
     * @group menus-items-api
     * Tests getting one meneItems
     */
    public function testGetMenu()
    {
        $menu = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);
        $menuItem = $menu->menuItems()->create([
            'title' => 'Test',
            'url' => 'http://google.com',
            'order' => 1
        ]);

        $this
            ->json('GET','api/site/menus/'.$menu->id.'/menu-item/'.$menuItem->id)
            ->assertResponseStatus(200)
            ->seeJson([
                'title' => 'Test',
            ]);
    }

    /**
     * @group menus-items-api
     * Tests creating a menu items - no authentication
     */
    public function testCreatingMenuItem()
    {
        $menu = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);
        $this
            ->json('POST','api/site/menus/'.$menu->id.'/menu-item',[
                'title' => 'Test',
                'url' => 'http://google.com',
                'order' => 1
            ])
            ->assertResponseStatus(201)
            ->seeJson([
                'title' => 'Test',
            ]);
    }


    /**
     * @group menus-items-api
     * Tests updating a menu items
     */
    public function testUpdateMenuItem()
    {
        $menu = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);
        $menuItem = $menu->menuItems()->create([
            'title' => 'Test',
            'url' => 'http://google.com',
            'order' => 1
        ]);
        $this
            ->json('PUT', 'api/site/menus/'.$menu->id.'/menu-item/'.$menuItem->id,['title' => 'Test Change'])
            ->assertResponseStatus(200)
            ->seeJson([
                'title' => 'Test Change',
            ]);
    }

    /**
     * @group menus-items-api
     * Tests deleting a menu items
     */
    public function testDeleteRank()
    {
        $menu = \Renegade\Models\Site\Menu::create(['name'=>'Frontend']);
        $menuItem = $menu->menuItems()->create([
            'title' => 'Test',
            'url' => 'http://google.com',
            'order' => 1
        ]);
        $this
            ->json('DELETE','api/site/menus/'.$menu->id.'/menu-item/'.$menuItem->id)
            ->assertResponseStatus(204);
    }


}
