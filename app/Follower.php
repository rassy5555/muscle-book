<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//投稿テーブル
class Follower extends Model
{
    //
    protected $fillable = [
        'follow_id','follower_id'
    ];

}