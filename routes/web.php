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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('organizador/index', 'OrganizadorController@index');
Route::resource('organizador', 'OrganizadorController');

Route::get('vendedor/index', 'VendedorController@index');
Route::resource('vendedor', 'VendedorController');

Route::get('portero/index', 'PorteroController@index');
Route::resource('portero', 'PorteroController');
