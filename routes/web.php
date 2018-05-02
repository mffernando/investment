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
Route::resource('institution', 'InstitutionsController');
Route::resource('group', 'GroupsController');
Route::resource('institution.product', 'ProductsController');

//moviment.application
Route::get('moviment', ['as' => 'moviment.application', 'uses' => 'MovimentsController@application']);
Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentsController@storeApplication']);

//php artisan route:list

#route resource does:
#Route::get('group', 'GroupsController@index');
#Route::post('group', 'GroupsController@store');
#Route::get('group/{id}', 'GroupsController@show');
#Route::update('group/{id}', 'GroupsController@update');
#Route::delete('group/{id}', 'GroupsController@delete');


//group.user.store
Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);
/*
Route::get('/', function () {
    return view('welcome');
});
*/
