<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
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

        $post->save();
        
        return redirect('/home');
    }

    public function person($sport, $id)
    {
        $sports = Post::where('sport', $sport)->get();
        $id = Post::find($id);
        return view('post.person', [
        'sport' => $sport,
        'id' => $id,
        ]);
    }
}
