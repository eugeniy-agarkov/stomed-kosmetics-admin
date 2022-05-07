<?php
/**
 * Gallery Group
 */
Route::group(
    [
        'prefix'        => '/gallery',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Gallery',
    ], function () {

    /**
     * Gallery
     */
    Route::get('/', 'GalleryController@index')->name('gallery.index');
    Route::get('/create', 'GalleryController@create')->name('gallery.create');
    Route::post('/create', 'GalleryController@store')->name('gallery.store');
    Route::get('/{image}', 'GalleryController@edit')->name('gallery.edit');
    Route::delete('/{image}', 'GalleryController@destroy')->name('gallery.destroy');
    Route::post('/{image}', 'GalleryController@update')->name('gallery.update');

});
