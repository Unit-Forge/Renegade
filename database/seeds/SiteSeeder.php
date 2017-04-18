<?php

use Illuminate\Database\Seeder;
use Renegade\Models\Site\Page;
use Renegade\Models\Site\Menu;
use Renegade\Models\Site\MenuItem;
use Renegade\Models\Site\Category;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // We want to create the basics/bare minimum for our new dynamic cms system to work
        $cat = Category::create(['name'=> 'Uncategorized','slug'=> 'uncategorized']);

        $menu = Menu::create(['name'=> 'Frontend']);
        $menu->menuItems()->create([
            'title' => 'Home',
            'url' => '/',
            'order' => 1
        ]);

        $menu->menuItems()->create([
            'title' => 'Blog',
            'url' => '/blog',
            'order' => 2
        ]);

        $menu->menuItems()->create([
            'title' => 'Apply',
            'url' => '/apply',
            'order' => 3
        ]);

        $page = Page::create(['title' => 'Home', 'slug' => 'home']);
        $page = Page::create(['title' => 'Apply', 'slug' => 'apply']);
    }
}
