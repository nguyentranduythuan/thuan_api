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

Route::get('login','Backend\AccountController@getLogin');
Route::post('login','Backend\AccountController@postLogin')->name('login');
Route::get('register','Backend\AccountController@getRegister');
Route::post('register','Backend\AccountController@postRegister')->name('register');
Route::get('logout','Backend\AccountController@logout')->name('logout');

	Route::namespace('API')->group(function(){
		Route::prefix('v1')->name('v1.')->group(function(){
			Route::get('dashboard','DashBoardController@dashboard')->name('dashboard');

			Route::prefix('category')->name('category.')->group(function(){
				Route::get('list','CategoryController@index')->name('index');
				Route::get('create','CategoryController@create')->name('create');
				Route::post('store','CategoryController@store')->name('store');
				Route::get('edit/{id}','CategoryController@edit')->name('edit');
				Route::post('edit/{id}','CategoryController@update')->name('update');
				Route::get('delete/{id}','CategoryController@destroy')->name('delete');
			});

			Route::prefix('item')->name('item.')->group(function(){
				Route::get('list','ItemController@index')->name('index');
				Route::get('getItem','ItemController@getItem')->name('getItem');
				Route::get('create','ItemController@create')->name('create');
				Route::post('store','ItemController@store')->name('store');
				Route::get('edit/{id}','ItemController@edit')->name('edit');
				Route::post('edit/{id}','ItemController@update')->name('update');
				Route::get('delete/{id}','ItemController@destroy')->name('delete');
			});
			// Route::prefix('color')->name('color.')->group(function(){
			// 	Route::get('list','ColorController@index')->name('index');
			// 	Route::get('create','ColorController@create')->name('create');
			// 	Route::post('create','ColorController@store')->name('store');
			// 	Route::get('edit/{id}','ColorController@edit')->name('edit');
			// 	Route::post('edit/{id}','ColorController@update')->name('update');
			// 	Route::post('delete','ColorController@destroy')->name('delete');
			// });
		});
	});
