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
Route::resource('gestion/contenido/ejercicio','ExerciseController');

/* Solucionies */
Route::resource('gestion/contenido/ejercicio/{id}/solucion','SolutionController');

/**Publicaciones */
Route::get('gestion/contenido/mis/publicaciones','PublicationController@index');

Route::get('gestion/contenido/mis/publicaciones/ejercicios', 'PublicationController@myExercise');

Route::get('gestion/contenido/mis/publicaciones/soluciones', 'PublicationController@mySolution');
/**Favoritos*/
Route::get('gestion/contenido/favoritos','FavoriteController@index');
Route::post('favorito/ejercicio/{id}', ['as' => 'favoritoEjercicio', 'uses' => 'FavoriteController@agregarFavoriteEjercicio']);


/**
 * select
 */
Route::get('/content/{id}','SelectController@getContent');