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
    return redirect("login");
});

Route::get('/testPdf', 'JuiciosController@testPdf');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/doc_juicios/{juicio_id}/{doc_tipo_id}','JuiciosController@getDocuments');

Route::group(['middleware' => 'role:administrador'], function() {
   Route::get('/listUsers', 'ProfilesController@listUsers');
   Route::post('/users/changeUserRoles', 'ProfilesController@changeUserRoles');
   Route::post('/users/registerUser', 'ProfilesController@registerUser');
   Route::post('/users/deleteUser', 'ProfilesController@deleteUser');

   Route::get('/juicio/cargarJuicio', 'JuiciosController@cargarJuicio');
   Route::post('/juicio/guardarJuicio', 'JuiciosController@guardarJuicio');
});

Route::group(['middleware' => 'role:colaborador', 'middleware' => 'role:administrador'], function() {
   Route::get('/juicio/editarJuicio', 'HomeController@index');
   Route::get('/juicios/{juicio_id}', 'JuiciosController@detalleJuicio');
});

