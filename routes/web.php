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

Route::get('/', 'HomeController@getHome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
	Route::get('catalog/index', 'CatalogController@getIndex')->name('catalog');
	Route::get('catalog/show/{id}', 'CatalogController@getShow')->name('show');
	Route::get('catalog/create', 'CatalogController@getCreate')->name('create');
	Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->name('edit');
	Route::post('catalog/create', 'CatalogController@postCreate');
	Route::put('catalog/edit/{id}', 'CatalogController@putEdit');
	Route::put('catalog/rent/{id}', 'CatalogController@putRent');
	Route::put('catalog/return/{id}', 'CatalogController@putReturn');
	Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie');
});

