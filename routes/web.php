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
//homepage
Route::get('/', ['uses' => 'Controller@homepage']);
//register
Route::get('/register', ['uses' => 'Controller@register']);

//Routes user auth
//login
Route::get('/login', ['uses' => 'Controller@login']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);

//Route::get('user', ['as' => 'user.index', 'uses' => 'UsersController@index']);
Route::resource('user', 'UsersController');


/*
Route::get('/', function () {
    return view('welcome');
});
*/
