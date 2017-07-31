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
Route::resource('church-reports', 'ChurchReportController', ['except' => ['create', 'edit']]);
Route::resource('district-reports', 'DistrictReportController', ['except' => ['create', 'edit']]);
// Route::resource('journals', 'JournalController', ['except' => ['create', 'edit']]);

Route::resource('national-offices.journals', 'NationalOfficeJournalController', ['except' => ['create', 'edit']]);
Route::resource('district-offices.district-reports', 'DistrictOfficeDistrictReportController', ['except' => ['create', 'edit']]);
Route::resource('churches.church-reports', 'ChurchChurchReportController', ['except' => ['create', 'edit']]);
Route::resource('church-reports.sources', 'ChurchReportSourceController', ['except' => ['create', 'edit']]);
Route::resource('district-reports.expenses', 'DistrictReportExpenseController', ['except' => ['create', 'edit']]);

Route::get('district-reports/{id}/indicators', 'DistrictReportController@indicators');
Route::get('organizations/{id}/reports', 'OrganizationController@reports');
