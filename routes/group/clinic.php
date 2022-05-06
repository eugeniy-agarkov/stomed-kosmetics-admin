<?php
/**
 * Reviews Group
 */
Route::group(
    [
        'prefix'        => '/clinics',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Clinic',
    ], function () {

    Route::get('/', 'ClinicController@index')->name('clinic.index');
    Route::get('/create', 'ClinicController@create')->name('clinic.create');
    Route::post('/', 'ClinicController@store')->name('clinic.store');
    Route::get('/{clinic}', 'ClinicController@edit')->name('clinic.edit');
    Route::post('/{clinic}', 'ClinicController@update')->name('clinic.update');
    Route::delete('/{clinic}', 'ClinicController@destroy')->name('clinic.destroy');

    /**
     * Page
     */
    Route::get('/{clinic}/page', 'ClinicPageController@edit')->name('clinic.page');
    Route::post('/{clinic}/page', 'ClinicPageController@update')->name('clinic.page.update');

    /**
     * Images
     */
    Route::get('/{clinic}/images', 'ClinicImageController@index')->name('clinic.images.index');
    Route::get('/{clinic}/images/create', 'ClinicImageController@create')->name('clinic.images.create');
    Route::post('/{clinic}/images', 'ClinicImageController@store')->name('clinic.images.store');
    Route::get('/{clinic}/images/edit/{image}', 'ClinicImageController@edit')->name('clinic.images.edit');
    Route::delete('/{clinic}/images/{image}', 'ClinicImageController@destroy')->name('clinic.images.destroy');
    Route::post('/{clinic}/images/{image}', 'ClinicImageController@update')->name('clinic.images.update');

    /**
     * Faq
     */
    Route::get('/{clinic}/faq', 'ClinicFaqController@index')->name('clinic.faq.index');
    Route::get('/{clinic}/faq/create', 'ClinicFaqController@create')->name('clinic.faq.create');
    Route::post('/{clinic}/faq', 'ClinicFaqController@store')->name('clinic.faq.store');
    Route::get('/{clinic}/faq/edit/{faq}', 'ClinicFaqController@edit')->name('clinic.faq.edit');
    Route::delete('/{clinic}/faq/{faq}', 'ClinicFaqController@destroy')->name('clinic.faq.destroy');
    Route::post('/{clinic}/faq/{faq}', 'ClinicFaqController@update')->name('clinic.faq.update');


});
