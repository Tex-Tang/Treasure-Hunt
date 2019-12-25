<?php

namespace App\Http\Controllers;

use App\Group_score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Group_score  $group_score
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $result = array();
        $data = array();
        $grps = Groups::all();
        foreach($grps as $grp) {
            array_push($data, ['groupname' => $grp->group_name, 'score' => Group_score::find($grp->id)->score]);
        }
        $result['result'] = 'OK';
        $result['data'] = $data;
        return $result;
    }

 }
