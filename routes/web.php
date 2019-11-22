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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
	Route::get('/', 'admin\DashboardController@index')->name('dashboard');

	Route::get('/add-user', 'admin\UserController@add_user')->name('add-user');
	Route::post('/add-user', 'admin\UserController@adding_user')->name('adding-user');

	Route::get('/show-users', 'admin\UserController@showing_users')->name('showing-users');

	Route::get('/edit-user/{id}', 'admin\UserController@edit_user')->name('edit-user');
	Route::post('/edit-user/{id}', 'admin\UserController@update_user')->name('update-user');


	Route::post('/delete-user/{id}', 'admin\UserController@delete_user')->name('delete-user');
});
