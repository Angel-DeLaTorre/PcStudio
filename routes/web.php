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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get ('/create','tagController@vista');
Route::post ('/create','tagController@create');

//Rutas de Empleados
Route::resource('empleado', 'Empleado\EmpleadoController')->middleware('auth');


//Rutas de clientes
Route::resource('cliente', 'Cliente\ClienteController');//->middleware('auth');


//Rutas Cuestionario
Route::resource('encuesta', 'Encuesta\EncuestaController');//->middleware('auth');





Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeAdministrativo', 'HomeAdministrativoController@index')->name('homeAdministrativo');

//Rutas de Proveedor
Route::get('/Proveedores', 'ProveedorController@index')->name('indexProveedor');
Route::get('/Proveedores/Create', 'ProveedorController@create')->name('createProveedor');
Route::get('/Proveedores/Edit/{idProveedor}', 'ProveedorController@edit')->name('editProveedor');
Route::post('/Proveedores/Store', 'ProveedorController@store')->name('storeProveedor');
Route::put('/Proveedores/Update/{idProveedor}', 'ProveedorController@update')->name('updateProveedor');
Route::get('/Proveedores/Delete/{idProveedor}', 'ProveedorController@destroy')->name('deleteProveedor');

//Rutas de Categoria
Route::get('/Categorias', 'CategoriaController@index')->name('indexCategoria');
Route::get('/Categorias/Create', 'CategoriaController@create')->name('createCategoria');
Route::get('/Categorias/Edit/{idCategoria}', 'CategoriaController@edit')->name('editCategoria');
Route::post('/Categorias/Store', 'CategoriaController@store')->name('storeCategoria');
Route::put('/Categorias/Update/{idCategoria}', 'CategoriaController@update')->name('updateCategoria');
Route::get('/Categorias/Delete/{idCategoria}', 'CategoriaController@destroy')->name('deleteCategoria');
