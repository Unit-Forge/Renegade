<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/


Route::group([
    'namespace' => 'API\Auth'
], function () {
    Route::get('users', 'UserController@index')->name('api.auth.users');
    Route::post('users', 'UserController@create')->name('api.auth.users.create');
    Route::get('users/{id}', 'UserController@show')->name('api.auth.users.show');
    Route::put('users/{id}', 'UserController@update')->name('api.auth.users.update');
    Route::delete('users/{id}', 'UserController@delete')->name('api.auth.users.delete');
});


Route::group([
    'namespace' => 'API\Auth\User'
], function () {
    Route::get('users/{id}/application', 'ApplicationController@show')->name('api.auth.users.application.show');
    Route::post('users/{id}/application', 'ApplicationController@create')->name('api.auth.users.application.create');
    Route::put('users/{id}/application', 'ApplicationController@update')->name('api.auth.users.application.update');
    Route::delete('users/{id}/application', 'ApplicationController@delete')->name('api.auth.users.application.delete');

    Route::get('users/{user_id}/teamspeak', 'TeamspeakController@index')->name('api.auth.users.teamspeak');
    Route::post('users/{user_id}/teamspeak', 'TeamspeakController@create')->name('api.auth.users.teamspeak.create');
    Route::get('users/{user_id}/teamspeak/{teamspeak_id}', 'TeamspeakController@show')->name('api.auth.users.teamspeak.show');
    Route::put('users/{user_id}/teamspeak/{teamspeak_id}', 'TeamspeakController@update')->name('api.auth.users.teamspeak.update');
    Route::delete('users/{user_id}/teamspeak/{teamspeak_id}', 'TeamspeakController@delete')->name('api.auth.users.teamspeak.delete');

});



Route::group([
    'prefix' => 'unit',
    'namespace' => 'API\Unit'
], function () {
    Route::get('ranks', 'RankController@index')->name('api.unit.ranks');
    Route::post('ranks', 'RankController@create')->name('api.unit.ranks.create');
    Route::get('ranks/{id}', 'RankController@show')->name('api.unit.ranks.show');
    Route::put('ranks/{id}', 'RankController@update')->name('api.unit.ranks.update');
    Route::delete('ranks/{id}', 'RankController@delete')->name('api.unit.ranks.delete');
});

Route::group([
    'prefix' => 'site',
    'namespace' => 'API\Site'
], function () {
    Route::get('menus', 'MenuController@index')->name('api.site.menus');
    Route::post('menus', 'MenuController@create')->name('api.site.menus.create');
    Route::get('menus/{id}', 'MenuController@show')->name('api.site.menus.show');
    Route::put('menus/{id}', 'MenuController@update')->name('api.site.menus.update');
    Route::delete('menus/{id}', 'MenuController@delete')->name('api.site.menus.delete');

    Route::get('menus/{menu}/menu-item', 'MenuItemController@index')->name('api.site.menus.items');
    Route::post('menus/{menu}/menu-item', 'MenuItemController@create')->name('api.site.menus.items.create');
    Route::get('menus/{menu}/menu-item/{item}', 'MenuItemController@show')->name('api.site.menus.items.show');
    Route::put('menus/{menu}/menu-item/{item}', 'MenuItemController@update')->name('api.site.menus.items.update');
    Route::delete('menus/{menu}/menu-item/{item}', 'MenuItemController@delete')->name('api.site.menus.items.delete');

    Route::get('categories', 'CategoryController@index')->name('api.site.categories');
    Route::post('categories', 'CategoryController@create')->name('api.site.categories.create');
    Route::get('categories/{id}', 'CategoryController@show')->name('api.site.categories.show');
    Route::put('categories/{id}', 'CategoryController@update')->name('api.site.categories.update');
    Route::delete('categories/{id}', 'CategoryController@delete')->name('api.site.categories.delete');

    Route::get('categories/{category}/posts', 'PostController@index')->name('api.site.categories.posts');
    Route::post('categories/{category}/posts', 'PostController@create')->name('api.site.categories.posts.create');
    Route::get('categories/{category}/posts/{post}', 'PostController@show')->name('api.site.categories.posts.show');
    Route::put('categories/{category}/posts/{post}', 'PostController@update')->name('api.site.categories.posts.update');
    Route::delete('categories/{category}/posts/{post}', 'PostController@delete')->name('api.site.categories.posts.delete');

    Route::get('pages', 'PageController@index')->name('api.site.pages');
    Route::post('pages', 'PageController@create')->name('api.site.pages.create');
    Route::get('pages/{id}', 'PageController@show')->name('api.site.pages.show');
    Route::put('pages/{id}', 'PageController@update')->name('api.site.pages.update');
    Route::delete('pages/{id}', 'PageController@delete')->name('api.site.pages.delete');

});
