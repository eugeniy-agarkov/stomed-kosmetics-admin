<?php
/**
 * Blog Group
 */
Route::group(
    [
        'prefix'        => '/blog',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Blog',
    ], function () {

    /**
     * Blog
     */
    Route::get('/', 'BlogController@index')->name('blog.index');
    Route::get('/create', 'BlogController@create')->name('blog.create');
    Route::post('/create', 'BlogController@store')->name('blog.store');
    Route::get('/{blog}', 'BlogController@edit')->name('blog.edit');
    Route::delete('/{blog}', 'BlogController@destroy')->name('blog.destroy');
    Route::post('/{blog}', 'BlogController@update')->name('blog.update');

    /**
     * Categories
     */
    Route::get('/categories/list', 'BlogCategoryController@index')->name('blog.categories.index');
    Route::get('/categories/create', 'BlogCategoryController@create')->name('blog.categories.create');
    Route::post('/categories/create', 'BlogCategoryController@store')->name('blog.categories.store');
    Route::get('/categories/{category}', 'BlogCategoryController@edit')->name('blog.categories.edit');
    Route::delete('/categories/{category}', 'BlogCategoryController@destroy')->name('blog.categories.destroy');
    Route::post('/categories/{category}', 'BlogCategoryController@update')->name('blog.categories.update');

    /**
     * Page
     */
    Route::get('/{blog}/page', 'BlogPageController@edit')->name('blog.page.edit');
    Route::post('/{blog}/page', 'BlogPageController@store')->name('blog.page.store');

    /**
     * Prices
     */
    Route::get('/{blog}/prices', 'BlogPriceController@index')->name('blog.prices.index');
    Route::get('/{blog}/prices/create', 'BlogPriceController@create')->name('blog.prices.create');
    Route::get('/{blog}/prices/{price}', 'BlogPriceController@edit')->name('blog.prices.edit');
    Route::post('/{blog}/prices', 'BlogPriceController@store')->name('blog.prices.store');
    Route::post('/{blog}/prices/{price}', 'BlogPriceController@update')->name('blog.prices.update');
    Route::delete('/{blog}/prices/{price}', 'BlogPriceController@destroy')->name('blog.prices.destroy');

});
