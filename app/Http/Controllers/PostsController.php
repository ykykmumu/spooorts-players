<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Reaction;
use Auth;
use Validator;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('post/index', [
            'posts' => $posts,
        ]);
    }

    public function show($sport, Request $request)
    {
        $sports = Post::where('sport', $sport)->paginate(8);
        

        if($request->has('keyword')) {
            $posts = Post::where('place', 'like', '%'.$request->get('keyword').'%')->paginate(8);
        }else
        {
            $posts = Post::paginate(4);
        }

        return view('post.show', compact('posts','sports'));   
    }


    public function new()
    {
        return view('post/new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),['caption' => 'required|max:255','place' => 'required|max:255']);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $post = new Post;
        $post->sport = $request->sport;
        $post->caption = $request->caption;
        $post->user_id = Auth::user()->id;
        $post->place = $request->place;
        $post->cost = $request->cost;
        $post->comment = $request->comment;

        $post->save();
        
        return redirect('/home');
    }

    public function person($sport, $id)
    {
        $posts = Post::all();
        $sports = Post::where('sport', $sport)->first();
        $id = User::find($id);
        $reactions = Reaction::find(1);
        return view('post.person', [
        'posts' => $posts,
        'sports' => $sports,
        'id' => $id,
        'reactions' => $reactions,
        ]);
    }

    public function edit($sport, $id)
    {
        $posts = Post::all();
        $sports = Post::where('sport', $sport)->first();
        $id = User::find($id);
        return view('post.postEditer', [
            'posts' => $posts,
            'sports' => $sports,
            'id' => $id,
            ]);
    }
}
