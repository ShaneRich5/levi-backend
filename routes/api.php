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

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/refresh', 'AuthController@refresh');
Route::get('/user', 'AuthController@user');

Route::resource('organizations', 'OrganizationController', ['except' => ['create', 'edit']]);
Route::resource('indicators', 'IndicatorController', ['except' => ['create', 'edit']]);
Route::resource('indicator-types', 'IndicatorTypeController', ['except' => ['create', 'edit']]);
Route::resource('reports', 'ReportController', ['except' => ['create', 'edit']]);
