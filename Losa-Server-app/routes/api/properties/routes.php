<?php 

Route::get('/properties', 'PropertyApiController@index');
Route::get('/properties/events/{property}', 'PropertyApiController@show');