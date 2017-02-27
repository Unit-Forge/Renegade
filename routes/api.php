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
    Route::delete('users/{id}/application', 'ApplicationController@show')->name('api.auth.users.application.delete');
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