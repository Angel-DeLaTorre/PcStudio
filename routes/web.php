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

Route::get('/home', 'HomeController@index')->name('home');

//Acciones de Proveedor
Route::get('/Proveedores', 'ProveedorController@index')->name('indexProveedor');
Route::get('/Proveedores/Create', 'ProveedorController@create')->name('createProveedor');
Route::get('/Proveedores/Edit/{idProveedor}', 'ProveedorController@edit')->name('editProveedor');
Route::post('/Proveedores/Store', 'ProveedorController@store')->name('storeProveedor');
Route::put('/Proveedores/Update/{idProveedor}', 'ProveedorController@update')->name('updateProveedor');
Route::get('/Proveedores/Delete/{idProveedor}', 'ProveedorController@destroy')->name('deleteProveedor');
