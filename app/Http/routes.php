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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/add/{number}/{number2}', function ($number, $number2) {

	return $number + $number2;

});

Route::get('/sayhello/{name}', function ($name = "World") {

	if($name == 'dylan') {
		return "HOWDY " . strtoupper($name). "!!!";
	}
    return "Hello," . strtoupper(" " . $name . "!");

});

Route::get('/roll-dice/{guess}', function($guess = 1)

{
	$diceroll = random_int(1, 6);

	$data = [];

	$data['guess'] = $guess;
	$data['diceroll'] = $diceroll;

	if(!is_numeric($guess) || $guess > 6 || $guess < 1)
		return "you guessed a non numeric number of your guess was not between 1 and 6";

	if ($data['guess'] == $data['diceroll']) {
		echo "you matched the guess and number!!!";
	}
    return view('roll-dice', $data);
		   
});

Route::get('/', 'HomeController@showWelcome');

Route::get('/increment/{number}', 'HomeController@increment');

Route::get('/uppercase/{word}/', 'HomeController@uppercase');






