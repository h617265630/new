<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/order','OrderController');
Route::post('/item/search','ItemController@search');
Route::resource('/item','ItemController');
Route::get('/','HomeController@index');
Route::post('/search','HomeController@search');
Route::post('/create','HomeController@create');

