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
        $sports = Post::where('sport', $sport)->orderBy('id', 'desc')->paginate(8);
        

        if($request->has('keyword')) {
            $posts = Post::where('sport', $sport)->whereHas('user', function($query) use($request) {
                $query->where('name', $request->get('keyword'));
            })->get();
        }else
        {
            $posts = Post::where('sport', $sport)->orderBy('id', 'desc')->paginate(8);
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


    public function person($sport, $id, $count)
    {
        $user = User::find($id);
        $sports = Post::where('user_id', $user->id)->where('sport', $sport)->where('id', $count)->first();
        $posts = Post::all();
        //$reactions = Reaction::findOrFail($user->id);
        return view('post.person', [
            'posts' => $posts,
            'sports' => $sports,
            'user' => $user,
            //'reactions' => $reactions,
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