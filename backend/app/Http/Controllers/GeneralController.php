<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Questions;
use App\Group_members;
use Illuminate\Support\Facades\Auth;


class GeneralController extends Controller
{
    public function beg_for_our_lives() {
        echo "don't hack our server thanks";
    }

    public function verify_mmh(Request $request) {
        if ($request->answer == "jotaro") {
            $user = Auth::user();
            $user->went_to_mmh_status = true;
            $user->push();

            return [
                "result" => "OK",
                "data" => true,
            ];
        }
        
        else {
            return [
                "result" => "OK",
                "data" => false,
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
                "group" => $user->group
            ]
        ];
    }
}
