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

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/', 'IndexController@index')->name('index');
Route::get('/pars', 'ParsController@index')->name('pars');

Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit')->middleware('UsersPanel');
Route::get('/products/add', 'ProductsController@add')->name('products.add');
Route::get('/products/{id}/index','ProductsController@delete')->name('products.delete')->middleware('UsersPanel');

Route::post('/products/add', 'ProductsController@submit');
Route::post('/products/{id}/edit', 'ProductsController@updateProduct');

Route::get('/products/{id}/addImageProduct', 'ProductsController@addImage')->name('products.addImage')->middleware('UsersPanel');
Route::post('/products/{id}/addImageProduct', 'ProductsController@addImageProduct')->name('products.addImageProduct')->middleware('UsersPanel');

Route::get('/users/{id}/addImageUser', 'UsersController@addImage')->name('users.addImage')->middleware('UserEditPanel');
Route::post('/users/{id}/addImageUser', 'UsersController@addImageUser')->name('users.addImageUser')->middleware('UserEditPanel');

Route::get('/stores/index', 'StoresController@index')->name('stores.index');
Route::get('/stores/{id}/store', 'StoresController@store')->name('store.index');


Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit')->middleware('UserEditPanel');
Route::get('/users/{id}/index','UsersController@delete')->name('users.delete')->middleware('UserEditPanel');
Route::get('/users/add', 'UsersController@add')->name('users.add');
Route::post('/users/{id}/edit', 'UsersController@updateUser');

Route::get('/users/adminPanel', 'AdminPanelController@adminPanel')->name('admin')->middleware('AdminPanel');
Route::post('/users/adminPanel','AdminPanelController@submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
