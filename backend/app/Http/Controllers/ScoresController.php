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
        $data = array();
        foreach(Group_scores::all() as $grp) {
            $data[] = array(
                "groupname" => Groups::find($grp->group_id)->group_name, 
                "score" => $grp->score);
        }   

        return [
            "result" => "OK",
            "data" => $data,
        ];
    }
 }
