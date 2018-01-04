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
    return 'welcome Emrevo Inc.';
});

Route::get('/snap','ExceptionsController@snap')->middleware('requestHandler:Exceptions\SomeThingWentWrongRequest');
Route::get('/login','Auth\AuthController@getLoginForm')->middleware('requestHandler:LoginFormRequest');
Route::post('login','Auth\AuthController@login')->middleware('requestHandler:LoginRequest');

Route::get('register','InstitutesController@registerForm')->middleware('requestHandler:RegisterFormRequest');
Route::post('register','InstitutesController@register')->middleware('requestHandler:RegisterInstituteRequest');
Route::get('home','HomeController@showHome')->middleware('requestHandler:ShowHomePageRequest');
Route::get('logout','Auth\AuthController@logout')->middleware('requestHandler:LogoutRequest');

Route::get('students/list','StudentsController@list')->middleware('requestHandler:Students\ListStudentsRequest');
//DummyNewRoute