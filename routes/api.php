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
Route::resource('organization-types', 'OrganizationTypeController', ['except' => ['create', 'edit']]);
Route::resource('indicators', 'IndicatorController', ['except' => ['create', 'edit']]);
Route::resource('indicator-types', 'IndicatorTypeController', ['except' => ['create', 'edit']]);

Route::group(['namespace' => 'Api'], function() {

    // Route::get('organizations', 'OrganizationController@index');

    // Route::resource('national-offices', 'NationalOfficeController', ['except' => ['create', 'edit']]);
    // Route::resource('district-offices', 'DistrictOfficeController', ['except' => ['create', 'edit']]);
    // Route::resource('churches', 'ChurchController', ['except' => ['create', 'edit']]);

    // Route::resource('district-reports', 'DistrictReportController', ['except' => ['create', 'edit']]);
    // Route::resource('church-reports', 'ChurchReportController', ['except' => ['create', 'edit']]);
    // Route::resource('sources', 'SourceController', ['except' => ['create', 'edit']]);
    // Route::resource('expenses', 'ExpenseController', ['except' => ['create', 'edit']]);

    // Route::resource('churches.church-reports', 'ChurchChurchReportController', ['except' => ['create', 'edit']]);
    // Route::resource('district-offices.district-reports', 'DistrictOfficeDistrictReportController', ['except' => ['create', 'edit']]);
    // Route::resource('national-offices.journals', 'NationalOfficeJournalController', ['except' => ['create', 'edit']]);

    // Route::get('district-offices/{id}/reports', 'DistrictOfficeController@reports');

    // Route::get('churches/{id}/reports', 'ChurchController@reports');
    // Route::post('church-reports/{reportId}/sources', 'SourceController@store');
    // Route::get('church-reports/{reportId}/sources', 'SourceController@index');
});

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