<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'place_id', 
    ];
}
