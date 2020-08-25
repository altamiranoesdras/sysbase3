<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'developer'],function (){

    Route::get('prueba/api','PruebaApiController@index')->name('developer.prueba.api');

    Route::get('passport/clients', 'PassportClientsController@index')->name('passport.clients');

});


Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/calendar', 'HomeController@calendar')->name('calendar');

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('profile', 'ProfileController@index')->name('profile');
Route::patch('profile/{user}', 'ProfileController@update')->name('profile.update');
Route::post('profile/{user}/edit/avatar', 'ProfileController@editAvatar')->name('profile.edit.avatar');

Route::resource('users', 'UserController');
Route::get('user/{user}/menu', 'UserController@menu')->name('user.menu');;
Route::patch('user/menu/{user}', 'UserController@menuStore')->name('users.menuStore');

Route::get('option/create/{option}', 'OptionController@create')->name('option.create');
Route::get('option/orden', 'OptionController@updateOrden')->name('option.order.store');
Route::resource('options',"OptionController");

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('projects', 'ProjectController');


Route::resource('configurations', 'ConfigurationController');

