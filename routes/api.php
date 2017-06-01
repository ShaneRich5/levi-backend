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

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::get('/refresh', 'Api\AuthController@refresh');
Route::get('/user', 'Api\AuthController@user');

Route::resource('national-offices', 'Api\NationalOfficeController');
Route::resource('district-offices', 'Api\DistrictOfficeController');
Route::resource('churches', 'Api\ChurchController');

Route::get('churches/{id}/reports', 'Api\ChurchController@reports');
Route::post('church-reports/{reportId}/sources', 'Api\SourceController@store');
Route::get('church-reports/{reportId}/sources', 'Api\SourceController@index');

Route::post('sources/{id}', 'Api\SourceController@update');

// Route::

// group([
//     'prefix' => 'api/v1',
//     'namespace' => 'Api\v1',
//     'middleware' => ['cors', 'jwt.refresh']
// ], function ($app) {
//     $app->get('/auth/refresh', 'AuthController@refresh');
// });
