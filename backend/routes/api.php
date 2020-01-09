<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('user', function (Request $request) {
        return Auth::user();
    });
    Route::post('logout', function (){ 
        Auth::logout();
    });
    Route::get('game/questions', 'QuestionsController@show');
    Route::get('game/question/{id}', 'QuestionsController@get_question');
    Route::post('game/question/answer', 'QuestionsController@answer');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@authenticate')->name("login");
Route::get('error', 'Auth\LoginController@failed')->name('error');

Route::get('game/scoreboard', 'ScoresController@show');

// for debugging purposes
//Route::post('game/add_question', 'QuestionsController@create');
//Route::post('game/generate_questions', 'QuestionsController@generate');
//Route::get('show_all_questions', 'GeneralController@show_all_questions');
//Route::get('show_all_users', 'GeneralController@show_all_users');
//Route::get('show_all_group_members', 'GeneralController@show_all_group_members');