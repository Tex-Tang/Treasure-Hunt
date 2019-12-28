<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Groups;

class Group_scores extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'score', 
    ];

    public function group() {
        return $this->belongsTo(Groups::class);
    }
}
