<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group_scores;

class Groups extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_name', 'user_id', 'streak', 
    ];

    public function myScore() {
        return $this->hasOne('App\Group_scores', 'group_id');
    }
}
