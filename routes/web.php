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
	Route::post('user/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::get('edit/{id}', 'App\Http\Controllers\UserController@edit')->name('edit.user');
	Route::post('edit/update/{id}', 'App\Http\Controllers\UserController@update')->name('update.user');
	Route::get('home/table/create', 'App\Http\Controllers\TableController@create')->name('table.create');
	Route::get('home/table/create/rowcol', 'App\Http\Controllers\TableController@rowcol')->name('table.rowcol');
	Route::post('home/table/create/success', 'App\Http\Controllers\TableController@success')->name('table.success');
	Route::get('home/table/detail/{id}', 'App\Http\Controllers\TableController@detail')->name('table.detail');
	Route::get('home/table/add', 'App\Http\Controllers\TableController@add')->name('table.add');
	Route::get('home/table/select', 'App\Http\Controllers\TableController@select')->name('table.select');
	Route::post('home/table/select/success', 'App\Http\Controllers\TableController@store')->name('select.success');
});

