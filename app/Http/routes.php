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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uppercase/{name}', function ($name = "World") {

	if($name == 'dylan') {
		return "HOWDY " . strtoupper($name). "!!!";
	}
    return "Hello," . strtoupper(" " . $name . "!");

});

Route::get('/increment/{number}', function ($number = 1) {

		return ++$number;

});

Route::get('/add/{number}/{number2})', function ($number, $number2) {

	return $number + $number2;

});
