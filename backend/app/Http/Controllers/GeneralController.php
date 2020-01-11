<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Questions;
use App\Group_members;


class GeneralController extends Controller
{
    public function beg_for_our_lives() {
        echo "don't hack our server thanks";
    }

    public function verify_mmh(Request $request) {
        if ($request->answer == "jotaro") {
            $user = Auth::user();
            $user->active = true;
            $user->push();

            return [
                "result" => "OK",
                "data" => [
                    "correct" => true,
                ],
            ];
        }
        else {
            return [
                "result" => "OK",
                "data" => [
                    "correct" => false,
                ],
            ];
        }
    }

    public function show_user() {
        $user = Auth::user();
        return [
            "result" => "OK",
            "data" => [
                "name" => $user->name,
                "username" => $user->username,
                "api_token" => $user->api_token,
                "active" => $user->active,
                "group" => $user->group
            ]
        ];
    }
}
