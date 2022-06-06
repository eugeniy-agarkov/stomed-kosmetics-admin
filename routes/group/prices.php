<?php
/**
 * Prices Group
 */
Route::group(
    [
        'prefix'        => '/prices',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Prices',
    ], function () {

    Route::get('/doctor', 'PricesController@index')->name('prices.doctor');
    Route::get('/direction', 'PricesController@index')->name('prices.direction');

    Route::post('/save/{price}', 'PricesController@update')->name('prices.edit');
    Route::delete('/destroy/{price}', 'PricesController@destroy')->name('prices.destroy');

});
