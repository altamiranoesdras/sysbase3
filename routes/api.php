<?php



Route::group(['as'=>'api.'], function () {

    Route::resource('options', 'OptionAPIController');

    Route::group(['middleware' => 'auth:api'], function () {

        Route::resource('permissions', 'PermissionAPIController');

        Route::resource('roles', 'RoleAPIController');
    });


});



