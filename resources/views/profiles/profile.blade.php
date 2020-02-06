@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">プロフィール</div>
                    <div class="card-body row pt-30">
                        @csrf
                        <div class="col-md-3 offset-md-1">
                          <img src="public/temp/{{ $user->id }}" class="card-img rounded-circle" alt="">  //画像が表示されない DBには入ってる模様
                          <p class="card-text text-center">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-7 mt-5">
                          <dl class="row justify-content-around text-left">
                            <dt class="p-0 col-1">名前：</dt>
                            <dd class="col-5"><h5 class="card-title">{{ $user->name }}</h5></dd>
                          </dl>
                             <dl class="row justify-content-around text-left">
                            <dt class="p-0 col-3">自己紹介：</dt>
                            <dd class="col-6"><p class="card-text">{{ $user->introduce }}</p></dd>
                          </dl>
                          @if(Auth::id() == $user->id)
                          <dl class="row justify-content-around text-left">
                            <dt class="p-0 col-3">メールアドレス：</dt>
                            <dd class="col-6"><p class="card-text">{{ $user->email }}</p></dd>
                          </dl>
                          @endif
                        </div>     
                    </div>

                        @if(Auth::id() == $user->id)
                          <div class="text-center">
                            <a class="btn btn-primary btn-sm mb-1" href="/edit/{{$user->id}}">プロフィールの編集</a>
                          </div>
                          <div class="text-center">
                            <form action="/delete/{{$user->id}}" method="DELETE">
                            {{ csrf_field() }}
                              <div class="destroy">
                                  <button type="submit" class="btn btn-danger">アカウント削除</a>
                              </div>
                            </form>
                          </div>
                        @endif   
            </div>
        </div>
    </div>
</div>

<div>
  <h1>投稿一覧</h1>
  
</div>

<a href="/home" class="row justify-content-center">戻る</a>
@endsection


