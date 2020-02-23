<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user_id = Post::where('id', $id)->first();
        $sports = Post::where('user_id', $id)->paginate(8);
        
        return view('profiles.profile', compact('user', 'sports'));
       
    }


    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('profiles.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->img_name) {
            $user->img_name = $request->file('img_name')->store('temp', 'public');
        }
        $user->introduce = $request->introduce;
        $user->save();

        return redirect()->route('profile', ['id' => $user]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (\Auth::id() == $user->id) {
            $user->delete();
        }
        return redirect('/');
    }

}