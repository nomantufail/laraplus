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

Route::get('/', function (){
    return 'Welcome!';
});

Route::get('/snap','ExceptionsController@snap')->middleware('requestHandler:Exceptions\SomeThingWentWrongRequest');
Route::get('/login','Auth\AuthController@getLoginForm')->middleware('requestHandler:LoginFormRequest');
Route::post('login','Auth\AuthController@login')->middleware('requestHandler:LoginRequest');

Route::get('register','UsersController@registerForm')->middleware('requestHandler:RegisterFormRequest');
Route::post('register','UsersController@register')->middleware('requestHandler:RegisterUserRequest');
Route::get('home','HomeController@showHome')->middleware('requestHandler:ShowHomePageRequest');
Route::get('logout','Auth\AuthController@logout')->middleware('requestHandler:LogoutRequest');

//DummyNewRoute