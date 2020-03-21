<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reaction;
use App\Constant\Status;


class ReactionController extends Controller
{
    public function create(Request $request)
    {
        $toUserId = $request->to_user_id;
        $fromUserId = $request->from_user_id;
        $likeStatus = $request->reaction;

        if($likeStatus === 'like'){
            $status = Status::LIKE;
        }elseif($likeStatus === 'Dislike'){
            $status = Status::DISLIKE;
        }else{
            $status = Status::REQUEST;
        }
        

        $checkReaction = Reaction::where([
            ['to_user_id', $toUserId],
            ['from_user_id', $fromUserId]
        ])->get();

        if($checkReaction->isEmpty()){
            $reaction = new Reaction();

            $reaction->to_user_id = $toUserId;
            $reaction->from_user_id = $fromUserId;
            $reaction->status = $status;

            $reaction->save();
            
        }

        return redirect()->to('/home')->with('flash_message', 'リクエストが送信されました');
    }



    public function update($to_user_id, $from_user_id, Request $request)
    {
        $toUserId = $request->to_user_id;
        $fromUserId = $request->from_user_id;
        $likeStatus = $request->reaction;

        // if($likeStatus === 'like'){
        //     $status = Status::LIKE;
        // }elseif($likeStatus === 'Dislike'){
        //     $status = Status::DISLIKE;
        // }else{
        //     $status = Status::REQUEST;
        // }
        

        $checkReaction = Reaction::where([
            ['to_user_id', $toUserId],
            ['from_user_id', $fromUserId]
        ])->get();

        
            $reaction = new Reaction();

            $reaction->to_user_id = $fromUserId;
            $reaction->from_user_id = $toUserId;
            $reaction->status = 0;

            $reaction->save();
            
        
        
        $matchingStatus = Reaction::where
        ([
        ['to_user_id', $to_user_id],
        ['from_user_id', $from_user_id]
        ])->update(['status' => $request->status]);


        return redirect()->to('/matching');

    }
        // アップデートしたらstatus更新してチャットトップページにリダイレクトする流れ
        // アップデートで数字を変更する処理が必要（２→１、１→０）みたいな
}