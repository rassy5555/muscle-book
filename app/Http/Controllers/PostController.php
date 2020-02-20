<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Image;

class PostController extends Controller
{
    //
    public function postShow()
    {
        return view('post');
    }

    //写真編集バリデータ
    public function postValidator(array $data){
        return Validator::make($data, [
            'comment' => ['nullable', 'string', 'max:200'],  
        ]);
    }

    public function post(Request $request){
        Log::debug($request);
        $this->postValidator($request->all())->validate();
        $user = Auth::user();

        //Postsテーブルにデータを格納
        $post = new Post();
        $post->fill($request->all());
        $post->user_id = $user->id;
        Log::debug($post);

        //Imagesテーブルにデータを格納
        if(!empty($request->image1)){
            $image1 = new Image();
            if($request->file('image1')->isvalid()){
                $file_path = $request->file('image1')->store('public');
            }
            $image1->image = str_replace('public/','',$file_path);
            $image1->user_id = $user->id;
            Log::debug($image1);
        }

        //Imagesテーブルにデータを格納
        if(!empty($request->myCroppa)){
            $image2 = new Image();
            if($request->file('myCroppa')->isvalid()){
                $file_path = $request->file('image1')->store('public');
            }
            $image1->image = str_replace('public/','',$file_path);
            $image1->user_id = $user->id;
            Log::debug($image1);
        }

    }
}
