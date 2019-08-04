<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('account', 'AccountController', ['except' => ['create', 'edit']]);
    Route::post('account/role','AccountController@updateRole')->name('account.role.update');
    Route::resource('news', 'NewsController', ['except' => ['create', 'edit']]);
    Route::resource('comment', 'CommentController', ['except' => ['create', 'edit']]);
    Route::resource('role', 'RoleController', ['except' => ['create', 'edit']]);
});
