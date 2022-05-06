<?php
/**
 * Doctor Group
 */
Route::group(
    [
        'prefix'        => '/doctor',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Doctor',
    ], function () {

    /**
     * Doctor
     */
    Route::get('/', 'DoctorController@index')->name('doctor.index');
    Route::get('/create', 'DoctorController@create')->name('doctor.create');
    Route::post('/', 'DoctorController@store')->name('doctor.store');
    Route::get('/{doctor}', 'DoctorController@edit')->name('doctor.edit');
    Route::post('/{doctor}', 'DoctorController@update')->name('doctor.update');
    Route::delete('/{doctor}', 'DoctorController@destroy')->name('doctor.destroy');

    /**
     * Sertificts
     */
    Route::get('/{doctor}/sertificats', 'DoctorSertificatController@index')->name('doctor.sertificat.index');
    Route::get('/{doctor}/sertificats/create', 'DoctorSertificatController@create')->name('doctor.sertificat.create');
    Route::post('/{doctor}/sertificats', 'DoctorSertificatController@store')->name('doctor.sertificat.store');
    Route::get('/{doctor}/sertificats/{sertificat}', 'DoctorSertificatController@edit')->name('doctor.sertificat.edit');
    Route::post('/{doctor}/sertificats/{sertificat}', 'DoctorSertificatController@update')->name('doctor.sertificat.update');
    Route::delete('/{doctor}/sertificats/{sertificat}', 'DoctorSertificatController@destroy')->name('doctor.sertificat.destroy');

    /**
     * Price
     */
    Route::get('/{doctor}/price', 'DoctorPriceController@index')->name('doctor.price.index');
    Route::get('/{doctor}/price/create', 'DoctorPriceController@create')->name('doctor.price.create');
    Route::post('/{doctor}/price', 'DoctorPriceController@store')->name('doctor.price.store');
    Route::get('/{doctor}/price/{price}', 'DoctorPriceController@edit')->name('doctor.price.edit');
    Route::post('/{doctor}/price/{price}', 'DoctorPriceController@update')->name('doctor.price.update');
    Route::delete('/{doctor}/price/{price}', 'DoctorPriceController@destroy')->name('doctor.price.destroy');

    /**
     * Page
     */
    Route::get('/{doctor}/page', 'DoctorPageController@edit')->name('doctor.page.edit');
    Route::post('/{doctor}/page', 'DoctorPageController@store')->name('doctor.page.store');

});
