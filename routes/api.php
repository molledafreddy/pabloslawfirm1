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

//Auth::routes();
Route::post('login', 'Auth\LoginController@doLogin');
Route::post('/logout', 'Auth\LoginController@logout');
Route::post('validEmail','Auth\LoginController@validEmail');
Route::post('password/reset','Auth\ResetPasswordController@reset');


Route::get('/getSection', 'SectionController@getComponetsbySection');
Route::get('/getComponent/{id}', 'ComponentController@getComponetsbyId');
Route::put('/updateComponent/{id}', 'ComponentController@update');
Route::delete('/deleteComponent/{id}', 'ComponentController@destroy');

Route::get('listUsers', 'UsersController@listUsers');
Route::post('createUser','UsersController@createUser');
Route::post('editUser/{id}', 'UsersController@editUser');
Route::post('deleteUser/{id}', 'UsersController@deleteUser');

Route::get('listClient', 'ClientsController@listClients');
Route::post('editClient', 'ClientsController@editClient');
Route::post('deleteClient', 'ClientsController@deleteClient');

//ROUTE CASES
Route::get('listCase', 'CaseController@listCases');
Route::get('listCreateCase', 'CaseController@listCreateCase');
Route::post('editCase', 'CaseController@createCase');

Route::post('deleteCase', 'CaseController@deleteClient');
Route::post('listCasesAssist', 'CaseController@getCasesByAsisassistant');
