<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

	public static $rules = [

            'title' => 'required|max:100',
            'content' => 'required',
            'url' => 'required|url'
    ];


}
