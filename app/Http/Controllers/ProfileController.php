<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profileEditShow(){
        $user = Auth::user();
        return view('profileEdit',["user" => $user]);
    }

    //パスワード変更バリデータ
    public function passwordValidator(array $data){
        $hashed_password = Auth::user()->password;
        return Validator::make($data, [
            'old_password' => ['required', 'string', 'min:8',"password_hash_check:$hashed_password"],
            'password' => ['required', 'string', 'min:8', 'confirmed','different:old_password'],
            'password_confirmation' => ['required', 'string', 'min:8'],        
            ]);
    }

    //プロフィール編集バリデータ
    public function profileValidator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:80', Rule::unique('users', 'email')->whereNot('email', Auth::user()->email)],
            'height' => ['nullable','integer','between:50,250'],
            'weight' => ['nullable','integer','between:25,250'],
            'comment' => ['nullable','string','max:200']
        ]);
    }

    //プロフィール編集処理
    public function profileEdit(Request $request){
        Log::debug($request);
        $this->profileValidator($request->all())->validate();
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        return response()->json();
    }

    //パスワード変更処理
    public function passwordChange(Request $request){
        Log::debug($request);
        $this->passwordValidator($request->all())->validate();
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json();
    }

    //プロフィール画像バリデータ
    public function profileImageValidator(array $data){
        return Validator::make($data, [
            'profile_image' => ['file','image','mimes:png,jpeg,jpg,gif'],
        ]);
    }

    public function profileImageChange(Request $request){
        if(!empty($request->profile_image)){
            Log::debug($request);
            $this->profileImageValidator($request->all())->validate();
            if($request->file('profile_image')->isvalid()){
                $file_path = $request->file('profile_image')->store('public');
                $user = Auth::user();
                $user->profile_image = str_replace('public/','',$file_path);
                $user->save();
            }
        }
        return response()->json();
    }
}
