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

Route::get('/','TestController@welcome');
Route::get('/prueba', function () {
    return "Prueba";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products','ProductController@index');//listar
Route::get('/admin/products/create','ProductController@create');//formulario
Route::post('/admin/products','ProductController@store');//registro

Route::get('/admin/products/{id}/edit','ProductController@edit');//formulario
Route::post('/admin/products/{id}/edit','ProductController@update');//formulario

//Route::get('/admin/products/{id}/delete','ProductController@destroy');//formulario
Route::post('/admin/products/{id}/delete','ProductController@destroy');//formulario
//Route::delete('/admin/products/{id}','ProductController@destroy');//formulario

//CR
//UD

//PUT PATCH DELETE