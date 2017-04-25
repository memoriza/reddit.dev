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

Route::get('/add/{number}/{number2}', 'HomeController@add');

Route::get('/sayhello/{name}', 'HomeController@sayHello');

Route::get('/rolldice/{guess}', 'HomeController@rolldice'); 

Route::get('/', 'HomeController@showWelcome');

Route::get('/increment/{number}', 'HomeController@increment');

Route::get('/uppercase/{word}/', 'HomeController@uppercase');

//CRUD operations for posts

Route::resource('posts', 'PostsController');









