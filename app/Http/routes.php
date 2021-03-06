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
Route::get('/search','PostsController@search');
Route::get('/account/{id}','PostsController@account');
Route::post('/account/{id}','PostsController@updateAccount');
Route::get('/password/{id}','PostsController@password');
Route::post('/password/{id}','PostsController@updatePassword');
Route::post('/posts/vote','PostsController@vote');
Route::resource('posts', 'PostsController');

// authentication routes

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

// testing out instation
Route::get('orm-test', function() {

	// $user = new \App\User();
	// $user->name = 'Kyle';
	// $user->email = 'kyle@gmail.com';
	// $user->password = 'password';
	// $user->save();

	// $post = new \App\Models\Post();
	// $post->title = 'My first post';
	// $post->content = 'My first post content';
	// $post->url = 'http://codeup.com';
	// $post->created_by = $user->id;
	// $post->save();

	$posts = \App\Models\Post::where('created_by',5)->get();

	return $posts;

});









