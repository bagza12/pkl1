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
    return view('home');
});
Route::get('dashboard' , function(){
    return view('/dashboard.index');
});
Route::get('/login','AuthController@login')->name('login');
Route::get('/logout','AuthController@logout');
Route::post('/postlogin','AuthController@postlogin');

Route::group(['middleware => auth'],function(){
    Route::get('/categories','DashboardController@index');
    Route::get('/categories','CategoriesController@index');
    Route::post('/categories/create','CategoriesController@create');
    Route::get('/categories/{id}/edit','CategoriesController@edit');
    Route::post('/categories/{id}/update','CategoriesController@update');
    Route::get('/categories/{id}/delete','CategoriesController@delete');
                                                
    Route::get('/article','ArticleController@index');
    Route::get('/article/{id}/edit', 'ArticleController@edit');
    Route::post('/article/create','ArticleController@create');
    Route::post('/article/{id}/update','ArticleController@update');
    Route::get('/article/{id}/delete','ArticleController@delete');

    Route::get('/user' , 'ManagementController@index');
    Route::get('/user/{id}/edit', 'ManagementController@edit');
    Route::post('/user/create','ManagementController@create');
    Route::post('/user/{id}/update','ManagementController@update');
    Route::get('/user/{id}/delete','ManagementController@delete');
});