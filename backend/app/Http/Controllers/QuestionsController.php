<?php

namespace App\Http\Controllers;

use App\Questions;
use App\Group_questions;
use App\Group_scores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{
    public function create(Request $request) {
        // request contains content, type, answer, score
        Questions::create([
            "content" => $request->content,
            "type" => $request->type,
            "answer" => $request->answer,
            "score" => $request->score,
        ]);
        return [
            "result" => "OK",
        ];
    }

    public function generate() {
        $i = 1;
        while($i <= 7) {
            Questions::create([
                "content" => ("what is " . $i . " + " . $i . "?"),
                "type" => 1,
                "answer" => (2 * $i),
                "score" => 0,
            ]);
            $i += 1;
        }
        return [
            "result" => "OK",
        ];
    }

    public function show()
    {
        $user = Auth::user();
        $group_id = $user->group->id;
        $counter = 4;
        $questions_selected = array();
        $data = array();
        
        // TODO: LOOK FOR BETTER WAY TO GET THE TOTAL NUMBER OF QUESTIONS
        $total_questions = 0;
        foreach(Questions::all() as $question) {
            $total_questions += 1;
        }

        foreach(Group_questions::all() as $current_question) {
            if ($current_question->group_id == $group_id && $current_question->score == -1) {
                $counter -= 1; // current_question has been given, but has not been answered yet
            }
            if ($current_question->group_id == $group_id) {
                $questions_selected[] = $current_question->question_id; // push_back question_id into questions_selected
            }
        }

        // in case there are less than 4 unanswered questions
        $counter = min($counter, $total_questions - count($questions_selected));
        $index = rand(1, $total_questions);

        while($counter > 0) {
            if ($index > $total_questions) $index = 1; // reset index
            if (in_array($index, $questions_selected)) {
                $index += 1;
                continue;
            }
            Group_questions::create([
                "group_id" => $group_id, 
                "question_id" => $index,
                "answer" => "", 
                "score" => -1, 
                "status" => 1,
            ]);
            $questions_selected[] = $index; // pushback index into questions_selected array
            $index += 1;
            $counter -= 1;
        }

        foreach(Group_questions::all() as $current_question) {
            // check for current_questions that have been assigned to group, but not answered yet
            if ($current_question->group_id == $group_id && $current_question->score == -1) {
                array_push($data, 
                    array("id" => $current_question->question_id, 
                        "content" => $current_question->question->content, 
                        "score" => $current_question->question->score));
            }
        }
        return [
            "result" => "OK", 
            "data" => $data, 
        ];
        /*
        $group_id = Auth::user()->group->id;
        $group_questions_id = Group_questions::where("group_id", $group_id)
                                            ->select('question_id')
                                            ->get()
                                            ->flatten();
        $uncompleted_questions = Group_questions::where("group_id", $group_id)
                                                ->where("score", -1)
                                                ->get();
        $selected_questions = Questions::whereNotIn('question_id', $answered_questions_id)
                                    ->get()
                                    ->random(4 - $uncompleted_questions->count());
        foreach($selected_questions as $question){
            Group_questions::create([
                "group_id" => $group_id, 
                "question_id" => $question->id,
                "answer" => "", 
                "score" => -1, 
                "status" => 1,
            ]);
        }
        $uncompleted_questions = Group_questions::where("group_id", $group_id)
                                                ->where("score", -1)
                                                ->get();
        return [
            "result" => "OK",
            "data" => $uncompleted_questions
        ];
        */
    }

    public function answer(Request $request) {
        if (Auth::check() == false) {
            return [
                "result" => "FAIL",
            ];
        }
        $user = Auth::user();
        $group_id = $user->group->id;
        $flag = (Questions::find($request->id)->answer == $request->answer ? true : false);
        
        if ($flag == true) {
            $user->group->streak += 1;
            $user->push();
            $streak = $user->group->streak;
            $delta = 80 + 20 * $streak;
            foreach(Group_questions::all() as $question) {
                if ($question->question_id == $request->id && $question->group_id == $group_id) {
                    $question->score = $delta;
                    $question->push();
                }
            }
            foreach(Group_scores::all() as $scores) {
                if ($scores->group_id == $group_id) {
                    $scores->score += $delta;
                    $scores->push();
                }
            }
            return [
                "result" => "OK", 
                "data" => [
                    "correct" => true,
                ],
            ];
        }
        else {
            $user->group->streak = 0;
            $user->push();
            foreach(Group_questions::all() as $question) {
                if ($question->question_id == $request->id && $question->group_id == $group_id) {
                    $current_status = $question->status;
                    if ($current_status == 1 || $current_status == 2) {
                        $question->status += 1;
                    }
                    else {
                        $question->score = 0;
                    }
                    $question->push();
                    return [
                        "result" => "OK", 
                        "data" => [
                            "correct" => false,
                        ],
                    ];
                }
            }
        }
        return [
            "result" => "FAIL",
        ];
        /*
        $question = Group_questions::where("question_id", $request->id)
                                ->where("score", -1);
        if($question->exists()){
            $group_question = $question->first();
            $group = Auth::user()->group;
            if(Questions::find($question->question_id)->answer == $request->answer){
                $group_question->score = 100 + 20 * $group->streak;
                $group_question->save();
                $group_score = Group_scores::find($group->id);
                $group_score->score += 100 + 20 * $group->streak;
                $group_score->save();
                $group->streak++;
                $group->save();
            }else{
                $group_question->status++;
                $group_question->save();
                $group->streak = 0;
                $group->save();
            }
        }
         */
    }
}
