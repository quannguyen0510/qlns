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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::resource('/account', 'AccountController')->only(['index', 'create', 'edit']);
        Route::get('/role/dashboard','RoleController@index')->name('admin.role.dashboard');
    });
});

Route::group(['prefix' => 'news'], function () {
    Route::get('index', 'NewsController@index')->name('news.index');
    Route::get('edit/{id}', 'NewsController@edit')->name('news.edit');
    Route::get('detail/{id}', 'NewsController@detail')->name('news.detail');
    Route::get('create', 'NewsController@create')->name('news.create');
    Route::get('json', 'NewsController@getJson')->name('news.json');
    Route::get('comment/{id}', 'NewsController@getComment')->name('news.comment');
});
