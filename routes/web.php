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

/*Route::get('/', function () {
    return view ('welcome');
});*/
Route::get('/', 'TestController@welcome');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//crear 
Route::get('/admin/productos', 'ProductController@index'); //mostrar el listado de productos
Route::get('/admin/productos/crear', 'ProductController@create'); //abrir el formulario de creación de productos
Route::post('/admin/productos', 'ProductController@store');//registrar en la base
//Modificar
Route::get('/admin/productos/{id}/editar', 'ProductController@edit'); //abrir el formulario de edicion de productos
Route::post('/admin/productos/{id}/editar', 'ProductController@update');//actualizar el producto