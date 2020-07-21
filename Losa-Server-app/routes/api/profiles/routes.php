<?php 

Route::get('/profile/{user}', 'ProfileApiController@index');
Route::get('/home-details/{user}', 'ProfileApiController@show');