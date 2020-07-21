<?php

require base_path('routes/web/initial-routes.php');

Route::get('/confirm-admin-role/{email}', 'ConfirmAdminUsersController@index')->middleware('EnabledToBeUser');

Route::group( [ 'prefix' => 'admin', 'middleware' => ['auth'] ], function () {

    require base_path('routes/admin/properties/routes.php');

    require base_path('routes/web/dashboard.php');

    require base_path('routes/admin/sync/routes.php');

    require base_path('routes/admin/register/routes.php');

    require base_path('routes/admin/users/routes.php');

    Route::resource('change-password', 'ChangePasswordController')->parameters(['change-password' => 'user']);

    Route::resource('invite-admin', 'AdminUsersController')->parameters(['invite-admin' => 'user']);

    Route::get('aircrafts/search', 'AircraftSearchController@show')->name('aircrafts.search');
    
    Route::resource('aircrafts', 'AircraftController');

    Route::resource('users-trashed', 'UserTrashedController');

    Route::resource('admins-trashed', 'AdminTrashedController');

    Route::resource('properties-trashed', 'PropertyTrashedController');

    Route::resource('aircrafts-trashed', 'AircraftsTrashedController');

    
});

require base_path('routes/development.php');

require base_path('routes/fallback.php');


