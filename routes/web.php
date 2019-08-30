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
Route::post('/', 'TestController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productos/{id}', 'ProductController@show');//controlador sin autenticacion
Route::get('/categories/{category}', 'CategoryController@show');
Route::get('/search', 'SearchController@show');
Route::group(['middleware' => 'auth'], function () {

    Route::post('/cart', 'CartDetailController@store');
	Route::delete('/cart', 'CartDetailController@destroy');

});


Route::post('/order', 'CartController@update');
//Autenticado
Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    //crear 
		Route::get('/productos', 'ProductController@index'); //mostrar el listado de productos
		Route::get('/productos/crear', 'ProductController@create'); //abrir el formulario de creación de productos
		Route::post('/productos', 'ProductController@store');//registrar en la base
		//Modificar
		Route::get('/productos/{id}/editar', 'ProductController@edit'); //abrir el formulario de edicion de productos
		Route::post('/productos/{id}/editar', 'ProductController@update');//actualizar el producto
		//eliminar
		Route::delete('/productos/{id}', 'ProductController@destroy');//actualizar el producto
		//imagenes 
		Route::get('/productos/{id}/images', 'ImageController@index'); // listado
		Route::post('/productos/{id}/images', 'ImageController@store'); // registrar
		Route::delete('/productos/{id}/images', 'ImageController@destroy'); // form eliminar	

		Route::get('/productos/{id}/images/select/{image}', 'ImageController@select'); //destacar una imagen
		//categorias CRUD
		Route::get('/categories', 'CategoryController@index'); //mostrar el listado de categorias
		Route::get('/categories/crear', 'CategoryController@create'); //abrir el formulario de creación de categorias
		Route::post('/categories', 'CategoryController@store');//registrar en la base
		//Modificar
		Route::get('/categories/{category}/editar', 'CategoryController@edit'); //abrir el formulario de edicion de categorias
		Route::post('/categories/{category}/editar', 'CategoryController@update');//actualizar el categorias
		//eliminar
		Route::delete('/categories/{id}', 'CategoryController@destroy');//actualizar el categorias

});
