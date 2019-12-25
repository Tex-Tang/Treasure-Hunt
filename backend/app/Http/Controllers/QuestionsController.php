<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $result = array();
        $result['result'] = "OK";
        $data = array();
        foreach(Groups::all() as $grp) {
            array_push($data, ['id' => $grp->id, 'content' => $grp->content, 'score' => $grp->score]);
        }
        $result['data'] = $data;
        return $result;
    }

    public function answer(Request $request) {
        // request contains group id, answer to question
        $correct_ans = Groups::find($request->id)->answer;
        $flag = false;
        if ($correct_ans == $request->answer) {
            $flag = true;
        }
        $result = array();
        $result['result'] = 'OK';
        $result['data'] = ['correct' => $flag];
        return $result;
    }

}
