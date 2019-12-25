<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_score extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'score', 
    ];

    public function group()
    {
        return $this->hasOne('App\Groups', 'id');
    }
}
