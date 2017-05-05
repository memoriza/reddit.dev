<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Votable;
use Vote;

class Post extends BaseModel

{
    use Votable;

	protected $table = 'posts';

	public static $rules = [

            'title' => 'required|max:100',
            'content' => 'required',
            'url' => 'required|url'
    ];

    // connecting each user to the respective posts 
    public function user(){
    	return $this->belongsTo('App\User', 'created_by');
    }

    public function votes() {
        return $this->hasMany('App\Models\Vote','votable_id');
    }



}
