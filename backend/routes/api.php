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
    Route::post('game/question/answer', 'QuestionsController@answer');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@authenticate')->name("login");
Route::get('error', 'Auth\LoginController@failed')->name('error');

Route::get('game/scoreboard', 'ScoresController@show');

/*
Route::post('game/add_question', 'QuestionsController@create');
Route::get('game/show_all_questions', 'QuestionsController@show_all');
*/