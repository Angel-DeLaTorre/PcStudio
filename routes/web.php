<?php

use Illuminate\Support\Facades\Route;

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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/show/{id}','tagController@show');

Route::get ('/create','tagController@vista');
Route::post ('/create','tagController@create');

Route::get ('/listaTag','tagController@read')->name('listaTag');

Route::get('/editar/{tag}','tagController@edit')->name('editar');
Route::patch('/update/{tag}','tagController@update')->name('update');

Route::get('/eliminar/{tag}','tagController@eliminar')->name('eliminar');
Route::delete('/delete/{tag}', 'tagController@delete')->name('delete');