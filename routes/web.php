<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Models\Option;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'developer'],function (){

    Route::get('prueba/api','PruebaApiController@index')->name('developer.prueba.api');

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile', 'ProfileController@index')->name('profile');
Route::patch('profile/{user}', 'ProfileController@update')->name('profile.update');

//Route::get('/users', 'HomeController@index')->name('users');
//Route::get('/menu', 'HomeController@index')->name('menu');

Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/', 'HomeController@index');

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::resource('users', 'UserController');
Route::get('user/{user}/menu', 'UserController@menu')->name('user.menu');;
Route::patch('user/menu/{user}', 'UserController@menuStore')->name('users.menuStore');

Route::get('option/create/{option}', 'OptionController@create')->name('option.create');
Route::get('option/orden', 'OptionController@updateOrden')->name('option.order.store');
Route::resource('options',"OptionController");


Route::resource('roles', 'RoleController');