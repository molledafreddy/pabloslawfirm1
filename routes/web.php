<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('getRoles',['as' => 'get.Roles','uses' => 'RolesController@getRoles' ]);
Route::get('getUsers',['as' => 'get.Users','uses' => 'UsersController@getUsers' ]);

Route::post('create/user',['as' => 'create.user','uses' => 'UsersController@create']);

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('{any}',function(){
     return view('home.index');
})->where('any','.*');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

