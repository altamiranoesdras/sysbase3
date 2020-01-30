<?php

//'middleware' => 'auth:api'
Route::group(['as'=>'api.'], function () {
    Route::resource('options', 'OptionAPIController');
});

