<?php 

Route::get('/aircrafts', 'AircraftApiController@index');
Route::get('/aircrafts/events/{aircraft}', 'AircraftApiController@show');