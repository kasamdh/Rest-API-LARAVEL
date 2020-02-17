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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//RESTful API with Laravel 



// // get all country Information
// Route::get('country','Country\CountryController@country');
// //get country info by ID
// Route::get('country/{id}','Country\CountryController@countryByID');
// //Post data
// Route::post('country','Country\CountryController@countrySave');
// //update the record
// Route::put('country/{id}','Country\CountryController@countryUpdate');
// //API to delete record
// Route::delete('country/{id}','Country\CountryController@countryDelete');