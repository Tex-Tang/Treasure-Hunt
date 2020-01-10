<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Groups;
use App\Group_members;
use App\Group_scores;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'group_name' => ['required', 'string', 'max:255', 'unique:groups'],
            'group_members.*.name' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/
    }

    public function register(Request $request){
        $data = $request->all();
        $validator = $this->validator($data);
        if($validator->fails()){
            return [
                "result" => "FAIL",
                "data" => $validator->errors()
            ];
        }
        $username = strtolower(preg_replace('/\s+/', '', $data['group_name']));
        $password = Str::random(8);
        $token = Str::random(80);
        $user = User::create([
            "name" => $data['group_name'],
            "username" => $username,
            "password" => Hash::make($password),
            "api_token" => $token,
        ]);
        $group = Groups::create([
            "group_name" => $data['group_name'],
            "user_id" => $user->id,
            "streak" => 0,
        ]);
        Group_scores::create([
            "group_id" => $group->id,
            "score" => 0,
        ]);
        foreach($data['group_members'] as $member){
            Group_members::create([
                "group_id" => $group->id,
                "name" => $member['name'],
             //   "student_id" => $member['student_id'],
            ]);
        }
        return [
            "result" => "OK",
            "data" => [
                "username" => $username,
                "password" => $password,
                "token" => $token
            ]
        ];
    }
}
