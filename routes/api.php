<?php
 
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/',function(){
    return 'welcome to emrevo api';
});

Route::get('fee_structure/get','FeeStructureController@get')->middleware('requestHandler:GetFeeStructureRequest');
Route::get('classes_details','EdClassController@classesDetails')->middleware('requestHandler:ClassesDetailsRequest');
//DummyNewRoute