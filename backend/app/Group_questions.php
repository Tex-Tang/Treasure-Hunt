<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_questions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'question_id', 'answer', 'score', 'status', 
    ];

    public function question()
    {
        return $this->belongsTo('App\Questions', 'question_id');
    }
}
