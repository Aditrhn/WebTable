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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('user/create', 'App\Http\Controllers\UserController@create')->name('create.user');
	Route::post('user/create/success', 'App\Http\Controllers\UserController@store')->name('create.success');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::get('edit/{id}', 'App\Http\Controllers\UserController@edit')->name('edit.user');
	Route::post('edit/update/{id}', 'App\Http\Controllers\UserController@update')->name('update.user');
	Route::get('home/create_table', 'App\Http\Controllers\TableController@create')->name('table.create');
	Route::post('home/create_table/success', 'App\Http\Controllers\TableController@store')->name('table.success');
});

