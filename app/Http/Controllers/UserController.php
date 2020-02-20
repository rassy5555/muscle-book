<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use App\Follower;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userDetail($user_id){
        $user = User::where('delete_flg',false)->find($user_id);
        if(empty($user) || $user_id == Auth::user()->id){
            return redirect()->action('HomeController@index');
        }
        return view('user.userDetail', ['user' => $user]);
    }

    public function follow(Request $request){
        $user = User::where('delete_flg',false)->find($request->follower_id);
        if(!empty($user)){
            $followers = new Follower();
            $followers->follow_id = Auth::user()->id;
            $followers->follower_id = $request->follower_id;
        } else {
            return redirect()->action('HomeController@index');
        }
    }
}
