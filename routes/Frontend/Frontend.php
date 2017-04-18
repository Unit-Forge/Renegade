<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        //My Inbox
        Route::get('my-inbox', ['as' => 'inbox', 'uses' => 'InboxController@index']);
        Route::get('my-inbox/create', ['as' => 'inbox.create', 'uses' => 'InboxController@create']);
        Route::post('my-inbox', ['as' => 'inbox.store', 'uses' => 'InboxController@store']);
        Route::get('my-inbox/{id}', ['as' => 'inbox.show', 'uses' => 'InboxController@show']);
        Route::put('my-inbox/{id}', ['as' => 'inbox.update', 'uses' => 'InboxController@update']);
        Route::post('my-inbox/delete', ['as' => 'inbox.removeThreads', 'uses' => 'InboxController@deleteInboxThreads']);
        Route::get('my-inbox/edit-message/{id}', ['as' => 'inbox.edit.message', 'uses' => 'InboxController@editMessage']);
        Route::put('my-inbox/edit-message/{id}', ['as' => 'inbox.edit.message.update', 'uses' => 'InboxController@editMessageSave']);


    });

    /*
        * Inbox
        */
    Route::get('autocomplete/users', 'AutocompleteController@getUsers')->name('autocomplete.users');


});
