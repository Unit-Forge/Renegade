<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access Management',

            'roles' => [
                'all'        => 'All Roles',
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',
                'main'       => 'Roles',
            ],

            'users' => [
                'all'             => 'All Users',
                'change-password' => 'Change Password',
                'create'          => 'Create User',
                'deactivated'     => 'Deactivated Users',
                'deleted'         => 'Deleted Users',
                'edit'            => 'Edit User',
                'main'            => 'Users',
                'view'            => 'View User',
            ],
        ],
        'site' => [
            'title' => 'Site Management',
            'categories' => [
                'all'        => 'All Categories',
                'create'     => 'Create Category',
                'edit'       => 'Edit Category',
                'management' => 'Category Management',
                'main'       => 'Categories',
            ],
            'menus' => [
                'all'        => 'All Menus',
                'create'     => 'Create Menu',
                'edit'       => 'Edit Menu',
                'management' => 'Menu Management',
                'main'       => 'Menus',
            ],
            'menu-items' => [
                'all'        => 'All Menu Items',
                'create'     => 'Create Menu Item',
                'edit'       => 'Edit Menu Item',
                'management' => 'Menu Item Management',
                'main'       => 'Menu Items',
            ],
            'posts' => [
                'all'        => 'All Posts',
                'create'     => 'Create Post',
                'edit'       => 'Edit Post',
                'management' => 'Post Management',
                'main'       => 'Posts',
            ],
            'pages' => [
                'all'        => 'All Pages',
                'create'     => 'Create Page',
                'edit'       => 'Edit Page',
                'management' => 'Page Management',
                'main'       => 'Pages',
            ],
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general'   => 'General',
            'system'    => 'System',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Arabic',
            'da'    => 'Danish',
            'de'    => 'German',
            'el'    => 'Greek',
            'en'    => 'English',
            'es'    => 'Spanish',
            'fr'    => 'French',
            'id'    => 'Indonesian',
            'it'    => 'Italian',
            'nl'    => 'Dutch',
            'pt_BR' => 'Brazilian Portuguese',
            'sv'    => 'Swedish',
            'th'    => 'Thai',
        ],
    ],
];
