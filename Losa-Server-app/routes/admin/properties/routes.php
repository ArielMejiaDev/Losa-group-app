<?php 

Route::get('properties/search', 'PropertySearchController@show')->name('properties.search');

Route::get('properties/searchbydates', 'PropertyController@searchByDates')->name('properties.searchByDates');

Route::resource('properties', 'PropertyController');