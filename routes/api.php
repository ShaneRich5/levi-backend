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

Route::get('organizations', 'Api\OrganizationController@index');

Route::resource('national-offices', 'Api\NationalOfficeController', ['except' => ['create', 'edit']]);
Route::resource('district-offices', 'Api\DistrictOfficeController', ['except' => ['create', 'edit']]);
Route::resource('churches', 'Api\ChurchController', ['except' => ['create', 'edit']]);

Route::resource('district-reports', 'Api\DistrictReportController', ['except' => ['create', 'edit']]);
Route::resource('church-reports', 'Api\ChurchReportController', ['except' => ['create', 'edit']]);
Route::resource('sources', 'Api\SourceController', ['except' => ['create', 'edit']]);
Route::resource('expenses', 'Api\ExpenseController', ['except' => ['create', 'edit']]);

Route::resource('churches.church-reports', 'Api\ChurchChurchReportController', ['except' => ['create', 'edit']]);
Route::resource('district-offices.district-reports', 'Api\DistrictOfficeDistrictReportController', ['except' => ['create', 'edit']]);

Route::get('district-offices/{id}/reports', 'Api\DistrictOfficeController@reports');

Route::get('churches/{id}/reports', 'Api\ChurchController@reports');
Route::post('church-reports/{reportId}/sources', 'Api\SourceController@store');
Route::get('church-reports/{reportId}/sources', 'Api\SourceController@index');



// Route::post('sources/{id}', 'Api\SourceController@update');
// Route::post('expenses/{id}', 'Api\ExpenseController@update');

// Route::get('sources', 'Api\SourceController@all');
// Route::get('expenses', 'Api\ExpenseController@all');

// Route::get('church-reports/{id}/total', 'Api\ChurchReportController@total');
// Route::get('journal', 'Api\NationalOfficeController@journals');


// group([
//     'prefix' => 'api/v1',
//     'namespace' => 'Api\v1',
//     'middleware' => ['cors', 'jwt.refresh']
// ], function ($app) {
//     $app->get('/auth/refresh', 'AuthController@refresh');
// });