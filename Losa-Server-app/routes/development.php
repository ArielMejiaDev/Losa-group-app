<?php 

Route::group(['prefix' => 'debug'], function () {

    Route::get('/properties/events/{property}', 'PropertyApiController@show');
    Route::get('/aircrafts/events/{aircraft}', 'AircraftApiController@show');

});