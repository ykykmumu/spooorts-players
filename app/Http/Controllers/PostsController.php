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
        $validator = Validator::make($request->all(),['sport' => 'required', 'caption' => 'required|max:255', 'place' => 'required|max:255', 'cost' => 'required|integer', 'comment' => 'required|max:255']);

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
         //Userモデルから引数で入ってきた$idの値が$userに代入される、つまり$userは$id
        $checkReaction = Reaction::where(
        ['to_user_id' => $id, 'from_user_id' => Auth::id()])->first();
        
        // reactionsテーブルのto_user_idと from_user_idを指定できれば、どこのテーブルかfirstで特定できる
        $sports = Post::where('user_id', $user->id)->where('sport', $sport)->where('id', $count)->first();
        //user_idカラムが$user(2つ上の$userの値)のidのところでかつ、$sportカラムが引数の$sportの値でかつ$idカラムが$countの一番最初のもの取ってきて
        $posts = Post::all();

        //Q_findで探さないといけない値は何か→reactionはリレーションすることで解決
        //これもリレーションで解決（上から2行目$user_idの定義）←$idの値はreactionテーブルのidの値をいれたい。この$idは引数の値であるため、今入っているのはto_user_idカラムの値。ブレードで、$reactions->status === 0に指定しても$reactionsの値は被る可能性
        return view('post.person', [
            'posts' => $posts,
            'sports' => $sports,
            'user' => $user,
            'checkReaction' => $checkReaction,
        ]);
    }


    public function edit($sport, $id, $count)
    {
        $posts = Post::all();
        $sports = Post::where('sport', $sport)->where('id', $count)->first();
        $id = User::find($id);
        return view('post.postEditer', [
            'posts' => $posts,
            'sports' => $sports,
            'id' => $id,
            ]);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->sport = $request->sport;
        $post->caption = $request->caption;
        $post->place = $request->place;
        $post->cost = $request->cost;
        $post->comment = $request->comment;

        $post->save();

        return redirect()->route('show', ['sport' => $post->sport]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('show', ['sport' => $post->sport]);
    }
}