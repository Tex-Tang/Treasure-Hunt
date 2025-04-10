<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'type', 'answer', 'score', 'hint',
    ];
}
