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
Route::get('/getDepartamento/{division_id}', 'HomeController@getDepartamento')->name('getDepartamento');
Route::get('/getAsignatura/{depto_id}', 'HomeController@getAsignatura')->name('getAsignatura');

Route::post('/resultados', 'HomeController@obtenerResultados')->name('resultados');
Route::get('/resultados', 'HomeController@mostrarResultados')->name('mostrarResultados');

Route::post('/resultados_pdf', 'HomeController@resultadosPdf')->name('resultados_pdf');

Route::post('/sadfi', 'SadfiController@postGen');
Route::post('/genvsgen', 'SadfiController@postGenVsGen');
Route::post('/expele', 'SadfiController@getExpele');
