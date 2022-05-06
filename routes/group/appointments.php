<?php
/**
 * Appointments Group
 */
Route::group(
    [
        'prefix'        => '/appointments',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Form',
    ], function () {

    Route::get('/', 'AppointmentController@index')->name('appointment.index');
    Route::delete('/{appointment}', 'AppointmentController@destroy')->name('appointment.destroy');

});
