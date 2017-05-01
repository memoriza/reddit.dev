<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel

{
	protected $table = 'posts';

	public static $rules = [

            'title' => 'required|max:100',
            'content' => 'required',
            'url' => 'required|url'
    ];

    public function user(){
    	return $this->belongsTo('App\User', 'created_by');
    }





}
