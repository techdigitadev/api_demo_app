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


Route::apiResource('v1/lapins', 'LapinController');//->middleware('auth:api');
Route::apiResource('v1/categories', 'CategorieController');//->middleware('auth:api');
Route::apiResource('v1/fichiers', 'FichierController');//->middleware('auth:api');

Route::get('v1/statistiques/', 'LapinController@statistiques');
Route::get('v1/fichiers/categorie/{id}', 'CategorieController@fichiers');
