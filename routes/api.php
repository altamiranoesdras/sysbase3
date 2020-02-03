<?php

//'middleware' => 'auth:api'
Route::group(['as'=>'api.','middleware' => 'auth:api'], function () {

    Route::resource('options', 'OptionAPIController');

    Route::resource('permissions', 'PermissionAPIController');

    Route::resource('roles', 'RoleAPIController');

});



