<?php

/**
 * All route names are prefixed with 'admin.access'.
 */
Route::group([
    'prefix'     => 'site',
    'as'         => 'site.',
    'namespace'  => 'Site',
], function () {

    /*
     * Page Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsPermission:manage-pages',
    ], function () {
        Route::group([], function () {
            /*
             * For DataTables
             */
            Route::post('pages/get', 'PageTableController')->name('pages.get');

            /*
             * User CRUD
             */
            Route::resource('pages', 'PageController');

        });
    });

});
