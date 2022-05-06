<?php
/**
 * Redirects Group
 */
Route::group(
    [
        'prefix'        => '/redirects',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Redirect',
    ], function () {

    /**
     * Blog
     */
    Route::get('/', 'RedirectController@index')->name('redirect.index');
    Route::get('/create', 'RedirectController@create')->name('redirect.create');
    Route::post('/create', 'RedirectController@store')->name('redirect.store');
    Route::get('/{redirect}', 'RedirectController@edit')->name('redirect.edit');
    Route::delete('/{redirect}', 'RedirectController@destroy')->name('redirect.destroy');
    Route::post('/{redirect}', 'RedirectController@update')->name('redirect.update');

});
