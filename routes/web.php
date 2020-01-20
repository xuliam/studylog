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
        Route::get('add/{adminuser?}', 'AdminUserDoController@add')->name('admin.adminuser.add');
        Route::post('add/{adminuser?}', 'AdminUserDoController@save')->name('admin.adminuser.add');
        Route::get('remove/{adminuser}', 'AdminUserDoController@remove')->name('admin.adminuser.remove');
        Route::get('state/{adminuser}', 'AdminUserDoController@state')->name('admin.adminuser.state');
    });
    Route::prefix('setting')->group(function (){
        Route::get('/', 'SettingController@index')->name('admin.setting');
        Route::post('/', 'SettingController@save')->name('admin.setting.again');
    });

    Route::prefix('resource')->group(function (){
        Route::get('/', 'ResourceController@index')->name('admin.resource');

        Route::get('/add/{resource?}', 'ResourceController@add')->name('admin.resource.add');
        Route::post('/add/{resource?}', 'ResourceController@save')->name('admin.resource.add');

        Route::get('/remove/{resource}', 'ResourceController@remove')->name('admin.resource.remove');

        Route::post('/up', 'ResourceController@up')->name('admin.resource.up');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
