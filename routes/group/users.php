<?php
/**
 * Users Group
 */
Route::group(
    [
        'prefix'        => '/users',
        'middleware'    => ['admin'],
        'namespace'     => 'App\\Http\\Controllers\\User',
    ], function () {

    /**
     * Users
     */
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/create', 'UserController@create')->name('user.create');
    Route::post('/create', 'UserController@store')->name('user.store');
    Route::get('/{user}', 'UserController@edit')->name('user.edit');
    Route::delete('/{user}', 'UserController@destroy')->name('user.destroy');
    Route::post('/{user}', 'UserController@update')->name('user.update');

});
