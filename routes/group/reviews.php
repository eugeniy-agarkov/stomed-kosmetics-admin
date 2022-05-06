<?php
/**
 * Reviews Group
 */
Route::group(
    [
        'prefix'        => '/reviews',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Reviews',
    ], function () {

    Route::get('/', 'ReviewController@index')->name('reviews.index');
    Route::get('/create', 'ReviewController@create')->name('reviews.create');
    Route::post('/create', 'ReviewController@store')->name('reviews.store');

    Route::get('/{review}', 'ReviewController@edit')->name('reviews.edit');
    Route::post('/{review}', 'ReviewController@update')->name('reviews.update');
    Route::delete('/{review}', 'ReviewController@destroy')->name('reviews.destroy');

    Route::post('/{review}/photos', 'ReviewPhotoController@store')->name('reviews.photos.store');
    Route::delete('/{review}/photos/{id}', 'ReviewPhotoController@destroy')->name('reviews.photos.destroy');

});
