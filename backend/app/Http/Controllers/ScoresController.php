<?php

namespace App\Http\Controllers;

use App\Group_scores;
use App\Groups;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Group_score  $group_score
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return [
            "result" => "OK",
            "data" => Groups::all()->map(function($group) {
                    $group->score = $group->myScore->score;
                    return $group;
                    })
        ];
    }
 }
