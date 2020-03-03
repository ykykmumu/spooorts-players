<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Reaction;
use App\Constant\Status;

class MatchingController extends Controller
{
    public function index()
    {
        //自分にlikeしてくれた人のidを残す
        $id_giveme_like = Reaction::where([
        ['to_user_id', Auth::id()],
        ['status', Status::LIKE]
        ])->pluck('from_user_id');
      
        
        //likeしてくれた人の中から自分がlikeした人だけを抽出
        $matching_ids = Reaction::whereIn('from_user_id', $id_giveme_like)
        ->where('status', Status::LIKE)
        ->where('to_user_id', Auth::id())
        ->pluck('from_user_id');
        var_dump($matching_ids);die;
  
        $matching_users = User::whereIn('id', $matching_ids)->get();


        //リクエストをくれた人のid
        $request_users= Reaction::where([
            ['from_user_id', Auth::id()],
            ['status', Status::LIKE]
            //ここをdislike（まだマッチしていない状況）にしたい
            ])->pluck('to_user_id');

        $request_users = User::whereIn('id', $request_users)->get();

        $match_users_count = count($matching_users);
        return view('users.index', compact('request_users', 'matching_users', 'match_users_count'));

    }
    
}

