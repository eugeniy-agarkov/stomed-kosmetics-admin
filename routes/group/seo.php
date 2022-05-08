<?php
/**
 * Seo Group
 */
Route::group(
    [
        'prefix'        => '/seo',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Seo',
    ], function () {

    /**
     * Seo
     */
    Route::get('/', 'SeoController@index')->name('seo.index');
    Route::get('/create', 'SeoController@create')->name('seo.create');
    Route::post('/create', 'SeoController@store')->name('seo.store');
    Route::get('/{seo}', 'SeoController@edit')->name('seo.edit');
    Route::delete('/{seo}', 'SeoController@destroy')->name('seo.destroy');
    Route::post('/{seo}', 'SeoController@update')->name('seo.update');

});
