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

}