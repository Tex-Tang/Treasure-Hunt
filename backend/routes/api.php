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
    Route::get('user', 'GeneralController@show_user');
    Route::post('logout', function (){ 
        Auth::logout();
    });

    Route::middleware('mmh_visited')->group(function() {
        Route::get('game/questions', 'QuestionsController@show');
        Route::get('game/question/{id}', 'QuestionsController@get_question');
        Route::post('game/question/answer', 'QuestionsController@answer');
    });

    Route::post('game/instruction/answer', 'GeneralController@verify_mmh');
    Route::get('game/scoreboard', 'ScoresController@show');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@authenticate')->name("login");
Route::get('error', 'Auth\LoginController@failed')->name('error');

// for debugging purposes
//Route::post('game/add_question', 'QuestionsController@create');
//Route::post('game/generate_questions', 'QuestionsController@generate');
