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

/*Inicio de sesion */
Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::auth();
Route::get('/home', 'HomeController@index')->name('home');

/**
 * HOME
 */
Route::get('gestion/contenido', function () {
    return view('home/home');
});

/* Ejercicios */

Route::get('gestion/contenido/crear/ejercicio', function () {
    return view('management/exercise/create');
});
Route::get('gestion/contenido/listar/ejercicios', function () {
    return view('management/exercise/index');
});
Route::get('gestion/contenido/ejercicio/editar', function () {
    return view('management/exercise/editar');
});
Route::get('gestion/contenido/ejercicio/eliminar', function () {
    return view('management/exercise/eliminar');
});
Route::get('gestion/contenido/ejercicio/detalles', function () {
    return view('management/exercise/details');
});

/**Publicaciones */
Route::get('gestion/contenido/mis/publicaciones', function () {
    return view('publication/index');
});

/**Favoritos*/
Route::get('gestion/contenido/favoritos', function () {
    return view('favorite/index');
});