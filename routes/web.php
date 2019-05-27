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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/juicio/{juicio_id}', 'JuiciosController@detalleJuicio');

Route::group(['middleware' => 'role:administrador'], function() {
   Route::get('/listUsers', 'ProfilesController@listUsers');
   Route::post('/users/changeUserRoles', 'ProfilesController@changeUserRoles');
   Route::post('/users/registerUser', 'ProfilesController@registerUser');
});
