<?php
/**
 * Directions Group
 */
Route::group(
    [
        'prefix'        => '/directions',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Direction',
    ], function () {

    /**
     * Direction
     */
    Route::get('/', 'DirectionController@index')->name('direction.index');
    Route::get('/create', 'DirectionController@create')->name('direction.create');
    Route::post('/create', 'DirectionController@store')->name('direction.store');
    Route::get('/{direction}', 'DirectionController@edit')->name('direction.edit');
    Route::delete('/{direction}', 'DirectionController@destroy')->name('direction.destroy');
    Route::post('/{direction}', 'DirectionController@update')->name('direction.update');

    /**
     * Page
     */
    Route::get('/{direction}/page', 'DirectionPageController@edit')->name('direction.page.edit');
    Route::post('/{direction}/page', 'DirectionPageController@store')->name('direction.page.store');

    /**
     * Categories
     */
    Route::get('/categories/list', 'DirectionCategoryController@index')->name('direction.categories.index');
    Route::get('/categories/create', 'DirectionCategoryController@create')->name('direction.categories.create');
    Route::post('/categories/create', 'DirectionCategoryController@store')->name('direction.categories.store');
    Route::get('/categories/{category}', 'DirectionCategoryController@edit')->name('direction.categories.edit');
    Route::delete('/categories/{category}', 'DirectionCategoryController@destroy')->name('direction.categories.destroy');
    Route::post('/categories/{category}', 'DirectionCategoryController@update')->name('direction.categories.update');

    /**
     * Page
     */
    Route::get('/categories/{category}/page', 'DirectionCategoryPageController@edit')->name('direction.categories.page.edit');
    Route::post('/categories/{category}/page', 'DirectionCategoryPageController@store')->name('direction.categories.page.store');

});
