<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Questions;
use App\Group_members;


class GeneralController extends Controller
{
    public function show_all_users() {
        $data = array();
        foreach(User::all() as $user) {
            $data[] = $user;
        }
        return [
            "result" => "OK",
            "data" => $data,
        ];
    }

    public function show_all_questions() {
        $data = array();
        foreach(Questions::all() as $question) {
            $data[] = $question;
        }
        return [
            "result" => "OK",
            "data" => $data,
        ];
    }

    public function show_all_group_members() {
        $data = array();
        foreach(Group_members::all() as $member) {
            $data[] = $member;
        }
        return [
            "result" => "OK",
            "data" => $data,
        ];
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
