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
/*
Route::get('/', function () {
    return view('welcome');
});
 */

Route::resource('/','HomeController');
Route::resource('home','HomeController');
Route::get('logout','HomeController@logout');
Route::resource('contacto','ContactosController');
Route::resource('reviews','ReviewsController');
Route::resource('single','SingleController');
Route::resource('videos','VideosController');
Route::resource('usuarios','UsuariosController');
Route::resource('generos','GeneroController');
Route::resource('roles','RolesController');
Route::resource('movies','MoviesController');
Route::resource('contacto','EmailController');
Route::resource('repository', 'ArchivosController');
Route::Resource('config','ConfigController');
Route::Resource('noticias','NewsController');
Route::get('review', 'HomeController@reviews');

/** Resetear contraseña **/
//Crear el arhivo password.blade.php en la carpeta views/auth
Route::get('password/email', 'Auth\ResetPasswordController@getEmail');
Route::post('password/email', 'Auth\ResetPasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@getReset');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset');
