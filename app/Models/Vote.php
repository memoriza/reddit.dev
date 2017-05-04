<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vote extends BaseModel
{
    use SoftDeletes;
    protected $fillable = ['status'];

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at',
    ];

    public function votable()
    {
        return $this->morphTo();
    }
}

