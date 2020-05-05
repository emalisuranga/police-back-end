<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@login');

 

// Route::apiResource('suspect','API\SuspectController');
// Route::apiResource('criminalCases','API\CriminalCasesController');


Route::middleware('auth:api')->group(function () {
    // Route::post('suspect', 'API\SuspectController@login');
    // Route::apiResource('suspect','API\SuspectController');
    // Route::apiResource('suspect','API\SuspectController');
 
    Route::get('criminalCases','API\CriminalCasesController@index');
    Route::post('suspect','API\SuspectController@store');
    Route::get('suspect','API\SuspectController@index');
    Route::get('getOfficer', 'API\UserController@getOfficer');
    Route::post('setOfficer','API\CriminalCasesController@update'); 
    Route::post('criminalCases','API\CriminalCasesController@store');
    // Route::get('getOfficer', 'API\UserController@getOfficer');
});