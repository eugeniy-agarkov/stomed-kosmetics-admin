<?php
/**
 * Feedback Group
 */
Route::group(
    [
        'prefix'        => '/feedback',
        'middleware'    => 'auth',
        'namespace'     => 'App\\Http\\Controllers\\Form',
    ], function () {

    Route::get('/', 'FeedbackController@index')->name('feedback.index');
    Route::delete('/{feedback}', 'FeedbackController@destroy')->name('feedback.destroy');

});
