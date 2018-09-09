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

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    if (\Illuminate\Support\Facades\Auth::user()) {
        return redirect('/admin/catch');
    } else {
        return redirect('/login');
    }
});

Route::get('/login', 'LoginController@index');
Route::get('/logout', 'LoginController@logout');
Route::post('/login', 'LoginController@login');

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function (){
    Route::get('', 'CatchController@index');

    Route::group(['prefix' => 'catch'], function(){
        Route::get('', 'CatchController@index');
        Route::post('find', 'CatchController@find');
        Route::post('importFoundArticles', 'CatchController@importFoundArticles');
    });

    Route::group(['prefix' => 'articles'], function(){
        Route::get('', 'ArticlesController@index');
        Route::post('list', 'ArticlesController@list');
        Route::post('deleteSelecteds', 'ArticlesController@deleteSelecteds');
    });
});
