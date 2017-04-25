<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

    public function showWelcome()

    {
    	
        return view('welcome');
    }

    public function increment($number) {

    	if (is_numeric($number)) {

		$data = ['number' => ++$number];


		}

	return view('increment', $data);

    }

    public function uppercase ($word) {

    	$data = ['upperword' => strtoupper($word), 'word' => $word];

		return view('uppercase', $data);

	}

    public function rolldice ($guess = 1) {

        $diceroll = random_int(1, 6);

        $data = [];

        $data['guess'] = $guess;
        $data['diceroll'] = $diceroll;

        if(!is_numeric($guess) || $guess > 6 || $guess < 1) {
            return "you guessed a non numeric number of your guess was not between 1 and 6";
        }

        if ($data['guess'] == $data['diceroll']) {
            echo "you matched the guess and number!!!";
        }
        return view('roll-dice', $data);
               
    }

    public function sayHello ($name = "World") {

        $data = [];
        $data['name'] = $name;

        if($data['name'] == 'dylan') {
            $data['name'] = "HOWDY " . strtoupper($name). "!!!";
        } else {
            $data['name'] = "Hello," . strtoupper(" " . $name . "!");
        }   
        return view('sayhello', $data);

    }

    public function add ($number, $number2) {
        $data = ['number'=>$number, 'number2'=>$number2, 'add'=>$number + $number2];

        return view('add', $data);

    }

}