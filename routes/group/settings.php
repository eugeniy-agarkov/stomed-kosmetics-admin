<?php
/**
 * Settings Group
 */
Route::group(
    [
        'prefix'        => '/settings',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers',
    ], function () {

    /**
     * Settings
     */
    Route::get('/', 'SettingsController@edit')->name('settings.edit');
    Route::post('/', 'SettingsController@store')->name('settings.store');

});
