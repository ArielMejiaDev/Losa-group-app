<?php 
use Illuminate\Support\Facades\Auth;

Route::view('/', 'auth.login');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');