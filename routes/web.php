<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','Producto\ProductoController@inicio')->name('inicio');

Auth::routes();

//Rutas de producto
Route::resource('producto', 'Producto\ProductoController')->middleware('auth');
Route::get('/producto/Delete/{idProducto}', 'Producto\ProductoController@destroy')->name('deleteProducto')->middleware('auth');
Route::get('/producto/detail/{idProducto}', 'Producto\ProductoController@detail')->name('showProducto')->middleware('auth');
Route::get('/producto/lista', 'Producto\ProductoController@busqueda')->name('listaProducto')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/show/{id}','tagController@show');
Route::get ('/create','tagController@vista');
Route::post ('/create','tagController@create');

//Rutas de Usuarios
Route::resource('usuario', 'Usuario\UsuarioController')->middleware('auth');

//Rutas de Usuarios
Route::resource('direccion', 'Direccion\DireccionController');

//Rutas de Usuarios
Route::get('/clienteMoral/Delete/{idCliente}', 'ClienteMoral\ClienteMoralController@destroy')->name('deleteCliente')->middleware('auth');
Route::resource('clienteMoral', 'ClienteMoral\clienteMoralController')->middleware('auth');


//Rutas de Empleados
Route::get('/empleado/Delete/{idEmpleado}', 'Empleado\EmpleadoController@destroy')->name('deleteEmpleado')->middleware('auth');
Route::resource('empleado', 'Empleado\EmpleadoController')->middleware('auth');


//Rutas de ClienteAdministrativo
Route::resource('clienteAdministrativo', 'ClienteAdministrativo\ClienteAdministrativoController');


//Rutas de clientes
Route::resource('cliente', 'Cliente\ClienteController')->middleware('auth');


//Rutas Cuestionario
Route::resource('encuesta', 'Encuesta\EncuestaController')->middleware('auth');




Route::get ('/listaTag','tagController@read')->name('listaTag');

Route::get('/editar/{tag}','tagController@edit')->name('editar');
Route::patch('/update/{tag}','tagController@update')->name('update');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeAdministrativo', 'HomeAdministrativoController@index')->name('homeAdministrativo');

Route::get('/eliminar/{tag}','tagController@eliminar')->name('eliminar');
Route::delete('/delete/{tag}', 'tagController@delete')->name('delete');


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

///Rutas de SnatchBot
//Request::path();
//$url = $request->path();
if(Request::path() == 1 || Request::path() == 2 || Request::path() == 3 || Request::path() == 4 || 
    Request::path() == 5 || Request::path() == 6 || Request::path() == 7 || Request::path() == 8 ||
    Request::path() == 9 || Request::path() == 10 || Request::path() == 11 || Request::path() == 12 || 
    Request::path() == 13 || Request::path() == 14 || Request::path() == 15 || Request::path() == 16 || 
    Request::path() == 17 || Request::path() == 18 || Request::path() == 19 ||  Request::path() == 20){

    Route::get (Request::path(),'SnatchBotController@index');
}

Route::get('/indexProducto','CarritoController@index');
Route::post('/indexProducto','CarritoController@agregarProductoCarrito');
Route::get('/Carrito','CarritoController@vistaProductosCarrito')->middleware('auth');
Route::get('/Delete/{idCarrito}', 'CarritoController@destroy')->name('deleteProducto');

Route::get('/Guardar/{idCarrito}', 'CarritoController@guardar')->name('guardarProducto');
Route::get('/asignarCompra/{idCarrito}', 'CarritoController@asignarCompra')->name('asignarCompra');

Route::get ('/datosDestino','ComprasController@indexCuestionarioDestino')->name('datosDestino')->middleware('auth');
Route::post ('/datosDestino','ComprasController@guardarDetalle')->name('datosDestino')->middleware('auth');
Route::post ('/DetallesPago','ComprasController@detallesPago')->name('datosDestino')->middleware('auth');
Route::post ('/insertarCompra','ComprasController@insertarCompra')->name('datosDestino')->middleware('auth');
Route::get ('/exito','ComprasController@exito')->name('exitoCompra')->middleware('auth');


Route::get('tipo/{type}', 'SweetController@notification');

//Envios
Route::get('/Envios', 'EnviosController@index')->name('indexEnvios');
Route::get('/Envios/Detalle/{idCompra}', 'EnviosController@Detalle')->name('detalleEnvios');
Route::get('/Envios/Edit/{idCompra}', 'EnviosController@edit')->name('editEnvio');
Route::put('/Envios/Update/{idCompra}', 'EnviosController@update')->name('updateEnvio');

