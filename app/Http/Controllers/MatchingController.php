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
        ['from_user_id', Auth::id()],
        ['status', Status::LIKE]
        ])->pluck('to_user_id');
        //from_user_idカラムのログインユーザidでかつ、statusカラムのステータスがlikeのものの、to_user_idカラムの値を代入
        //自分にlikeしてくれた人=to_user_id
        
        
        //likeしてくれた人の中から自分がlikeした人だけを抽出
        $matching_ids = Reaction::whereIn('to_user_id', $id_giveme_like)
        //自分にきたidを取得
        ->where('status', Status::LIKE)
        ->where('from_user_id', Auth::id())
        //自分が相手に送ったidを取得
        ->pluck('to_user_id');
        

        //Q_ここはなぜ逆になっているのか(いま書き換えてエラー出ませんでした)  
        //今はstatusが0だから表示されるが、数値が変わったら表示できないのでは
        $matching_users = User::whereIn('id', $matching_ids)->get();
        //Q_ここはidカラムででいいのか、to_user_idが４でidも4
        //A_ここのidはusersテーブルであることに注意


        //リクエストをくれた人のid
        $request_users= Reaction::where([
            ['to_user_id', Auth::id()],
            ['status', Status::DISLIKE]
            ])->pluck('from_user_id');
        // ここはto_user_idが相手からリクエストを送られてきたという意味でauthで自分のidを取得

        $request_users = User::whereIn('id', $request_users)->get();

        $match_users_count = count($matching_users);
        $request_users_count = count($request_users);

        
        return view('users.index', compact('request_users', 'matching_users', 'match_users_count', 'request_users_count'));

    }
    
}

//likeしてくれた人のidとlikeした人のidを分けて取得する意味が分からない
//片方しか取得できないのでマッチした人を表示させる事ができない
//ブレードで表示させたいのはマッチしている人、
//reactionsテーブルで相互に送り合っていないとマッチしていない事が分かった→statusカラムの意味づけは何？