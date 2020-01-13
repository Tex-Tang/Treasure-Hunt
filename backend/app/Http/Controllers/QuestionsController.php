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

    public function generate(Request $request) {
        $i = 1;
        while($i <= $request->number) {
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

        $total_questions = Questions::count();
        $assigned_questions_ids = Group_questions::where("group_id", $group_id)
                                                    ->get()
                                                    ->pluck("question_id");

        // ensures counter doesn't exceed the number of questions left unanswered
        $counter = min(4 - (Group_questions::where("group_id", $group_id)->where("score", -1)->get()->count()), 
                       $total_questions - count($assigned_questions_ids)); 

        foreach(Questions::whereNotIn("id", $assigned_questions_ids)->get()->random($counter) as $question) {
            Group_questions::create([
                "group_id" => $group_id, 
                "question_id" => $question->id,
                "answer" => "", 
                "score" => -1, 
                "status" => 1,
            ]);
        }

        $uncompleted_questions_ids = Group_questions::where("group_id", $group_id)
                                                    ->where("score", -1)
                                                    ->get()
                                                    ->pluck('question_id');

        return [
            "result" => "OK", 
            "data" => Questions::whereIn("id", $uncompleted_questions_ids)
                                ->select(['id', 'content', 'score'])
                                ->get(),
        ];  
    }

    public function get_question(Request $request) {
        $question_id = $request->id;
        $user = Auth::user();
        $question = Group_questions::where('question_id', $question_id)->where('score', -1)->where('group_id', $user->group->id);

        if ($question->exists() == false) {
            return [
                "result" => "FAIL",
                "data" => "dont hack our server thx",
            ];
        }
        else {
            $question = Questions::select(["id","content", "hint"])->where("id", $question_id)->first();
            return [
                "result" => "OK",
                "data" => $question,
            ];
        }
        /*
        test if question can currently be displayed to current user:
            only if score for that question is -1
        */
    }

    public function answer(Request $request) {
        $user = Auth::user();
        $group = $user->group;
        $group_id = $user->group->id;
        $group_question = Group_questions::where('group_id', $group_id)
                                        ->where('question_id', $request->id)
                                        ->where('score', -1);

        // check if request is valid
        if ($group_question->exists() == false) {
            $check = Group_questions::where('group_id', $group_id)
                                    ->where('question_id', $request->id);

            if ($request->id > Questions::count()) {
                $error_message = "Invalid question id";
            }
            else if ($check->exists() && $check->get()->first()->score != -1) {
                if ($check->get()->first()->score == 0) {
                    $error_message = "Question has already been attempted three (3) times incorrectly";
                }
                else {
                    $error_message = "Question has already been correctly answered";
                }
            }
            else {
                $error_message = "Question has not been assigned to group yet";
            }

            return [
                "result" => "FAIL",
                "error_message" => $error_message,
            ];
        }

        $group_question = $group_question->get()->first();
        $answer_1 = Questions::find($request->id)->answer;
        $answer_2 = $request->answer;
        $flag = (preg_replace('/\s+/', '', strtolower($answer_1)) == preg_replace('/\s+/', '', strtolower($answer_2)) ? true : false);
        
        $group_question->answer = $request->answer;
        $group_question->push();

        if ($flag) {
            $delta = 100 + 20 * $group->streak;
            $group->streak += 1;
            $group->push();

            $group_question->score = $delta;
            $group_question->push();

            $group_score = Group_scores::find($group->id);
            $group_score->score += $delta;
            $group_score->push();

            return [
                "result" => "OK",
                "data" => [
                    "correct" => true,
                ],
            ];
        }
        else {
            $group->streak = 0;
            $group->push();

            $group_question->status += 1;
            if ($group_question->status > 3) {
                $group_question->score = 0;
            }
            $group_question->push();

            return [
                "result" => "OK",
                "data" => [
                    "correct" => false,
                ],
            ];
        }
    }
}
