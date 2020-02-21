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
        $reactionToId = Reaction::where([
        ['to_user_id', Auth::id()],
        ['status', Status::like]
        ])->pluck('from_user_id');
        
    }
}