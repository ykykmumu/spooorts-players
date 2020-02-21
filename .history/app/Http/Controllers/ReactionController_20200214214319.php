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
        }else{
            $status = Status::DISLIKE;
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
