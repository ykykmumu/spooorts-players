<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class SearchController extends Controller
{
    public function getIndex(Request $request)
    {
        $sports = Post::where('sport', $sport)->paginate(8);
        if($request->has('keyword')) {
            $posts = Post::where('caption', 'like', '%'.$request->get('keyword').'%')->paginate(8);
            var_dump($posts);exit;
        }else
        {
            $posts = Post::paginate(4);
            var_dump($posts);exit;
        }

        return view('post.show', compact('posts','sports'));
    }
}
