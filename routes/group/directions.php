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

    /**
     * Images
     */
    Route::get('/{direction}/images', 'DirectionImageController@index')->name('direction.images.index');
    Route::get('/{direction}/images/create', 'DirectionImageController@create')->name('direction.images.create');
    Route::post('/{direction}/images', 'DirectionImageController@store')->name('direction.images.store');
    Route::get('/{direction}/images/edit/{image}', 'DirectionImageController@edit')->name('direction.images.edit');
    Route::delete('/{direction}/images/{image}', 'DirectionImageController@destroy')->name('direction.images.destroy');
    Route::post('/{direction}/images/{image}', 'DirectionImageController@update')->name('direction.images.update');

    /**
     * Gallery
     */
    Route::get('/{direction}/gallery', 'DirectionGalleryController@index')->name('direction.gallery.index');
    Route::get('/{direction}/gallery/create', 'DirectionGalleryController@create')->name('direction.gallery.create');
    Route::post('/{direction}/gallery', 'DirectionGalleryController@store')->name('direction.gallery.store');
    Route::get('/{direction}/gallery/edit/{image}', 'DirectionGalleryController@edit')->name('direction.gallery.edit');
    Route::delete('/{direction}/gallery/{image}', 'DirectionGalleryController@destroy')->name('direction.gallery.destroy');
    Route::post('/{direction}/gallery/{image}', 'DirectionGalleryController@update')->name('direction.gallery.update');

    /**
     * Prices
     */
    Route::get('/{direction}/prices', 'DirectionPriceController@index')->name('direction.prices.index');
    Route::get('/{direction}/prices/create', 'DirectionPriceController@create')->name('direction.prices.create');
    Route::get('/{direction}/prices/{price}', 'DirectionPriceController@edit')->name('direction.prices.edit');
    Route::post('/{direction}/prices', 'DirectionPriceController@store')->name('direction.prices.store');
    Route::post('/{direction}/prices/{price}', 'DirectionPriceController@update')->name('direction.prices.update');
    Route::delete('/{direction}/prices/{price}', 'DirectionPriceController@destroy')->name('direction.prices.destroy');

});
