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
    return redirect()->route('home');
});

Route::get('/migrate', function () {
    \Artisan::call('migrate:fresh --seed');
    dd("Migration completed");
});

Route::get('/clearcache', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('clear-compiled');
    \Artisan::call('optimize:clear');
    dd("Cache cleared");
});

Auth::routes();
// Programa de estudios
Route::get('/programa_de_estudios', 'HomeController@index')->name('home');
Route::get('/getDepartamento/{division_id}', 'HomeController@getDepartamento')->name('getDepartamento');
Route::get('/getAsignatura/{depto_id}', 'HomeController@getAsignatura')->name('getAsignatura');
Route::post('/resultados', 'HomeController@obtenerResultados')->name('resultados');
Route::get('/resultados', 'HomeController@mostrarResultados')->name('mostrarResultados');
Route::post('/resultados_pdf', 'HomeController@resultadosPdf')->name('resultados_pdf');
// SIVACORE
Route::get('/sivacore', 'SadfiController@sivacore')->name('sivacore');
Route::post('/reporte_sivacore', 'SadfiController@postGen')->name('reporte_sivacore');
