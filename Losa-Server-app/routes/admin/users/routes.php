<?php 

Route::get('users/search', 'UserSearchController@show')->name('users.search');
Route::resource('users', 'UserController');