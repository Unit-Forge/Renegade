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
    'prefix' => 'unit',
    'namespace' => 'API\Unit'
], function () {
    Route::get('ranks', 'RankController@index')->name('api.unit.ranks');
    Route::post('ranks', 'RankController@create')->name('api.unit.ranks.create');
    Route::get('ranks/{id}', 'RankController@show')->name('api.unit.ranks.show');
    Route::put('ranks/{id}', 'RankController@update')->name('api.unit.ranks.update');
    Route::delete('ranks/{id}', 'RankController@delete')->name('api.unit.ranks.delete');
});