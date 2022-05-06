<?php
/**
 * Sales Group
 */
Route::group(
    [
        'prefix'        => '/sales',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Sales',
    ], function () {

    /**
     * Sales
     */
    Route::get('/', 'SaleController@index')->name('sale.index');
    Route::get('/create', 'SaleController@create')->name('sale.create');
    Route::post('/create', 'SaleController@store')->name('sale.store');
    Route::get('/{sale}', 'SaleController@edit')->name('sale.edit');
    Route::delete('/{sale}', 'SaleController@destroy')->name('sale.destroy');
    Route::post('/{sale}', 'SaleController@update')->name('sale.update');

    /**
     * Categories
     */
    Route::get('/categories/list', 'SaleCategoryController@index')->name('sale.categories.index');
    Route::get('/categories/create', 'SaleCategoryController@create')->name('sale.categories.create');
    Route::post('/categories/create', 'SaleCategoryController@store')->name('sale.categories.store');
    Route::get('/categories/{category}', 'SaleCategoryController@edit')->name('sale.categories.edit');
    Route::delete('/categories/{category}', 'SaleCategoryController@destroy')->name('sale.categories.destroy');
    Route::post('/categories/{category}', 'SaleCategoryController@update')->name('sale.categories.update');

    /**
     * Page
     */
    Route::get('/{sale}/page', 'SalePageController@edit')->name('sale.page.edit');
    Route::post('/{sale}/page', 'SalePageController@store')->name('sale.page.store');

    /**
     * Prices
     */
    Route::get('/{sale}/prices', 'SalePriceController@index')->name('sale.prices.index');
    Route::get('/{sale}/prices/create', 'SalePriceController@create')->name('sale.prices.create');
    Route::get('/{sale}/prices/{price}', 'SalePriceController@edit')->name('sale.prices.edit');
    Route::post('/{sale}/prices', 'SalePriceController@store')->name('sale.prices.store');
    Route::post('/{sale}/prices/{price}', 'SalePriceController@update')->name('sale.prices.update');
    Route::delete('/{sale}/prices/{price}', 'SalePriceController@destroy')->name('sale.prices.destroy');

});
