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

Route::prefix('admin')->group(function (){
    Route::get('login', 'AdminUserController@index')->name('admin.login');
    Route::post('login', 'AdminUserController@check')->name('admin.check');
    Route::get('logout', 'AdminUserController@logout')->name('admin.logout');
    Route::middleware(['adminLoginCheck'])->group(function (){
        Route::get('show', 'AdminUserController@show')->name('admin.show');
    });
    Route::prefix('adminuser')->group(function (){
        Route::get('/', 'AdminUserDoController@index')->name('admin.adminuser');
        Route::get('add', 'AdminUserDoController@add')->name('admin.adminuser.add');
        Route::post('add', 'AdminUserDoController@save')->name('admin.adminuser.save');
        Route::delete('remove/{adminuser}', 'AdminUserDoController@remove')->name('admin.adminuser.remove');
        Route::get('state/{adminuser}', 'AdminUserDoController@state')->name('admin.adminuser.state');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
