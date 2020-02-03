<?php

//'middleware' => 'auth:api'
Route::group(['as'=>'api.','middleware' => 'auth:api'], function () {
    Route::resource('options', 'OptionAPIController');
});

