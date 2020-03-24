@extends('layouts.app')

@section('content')



<div class="containter text-center">
    <h1>{{ $user->name }}さんのページ</h1>
</div>


<div class="container">
  <div class="container_title">
      <h1 class="text-center">{{ $sports->sport }}</h1>
  </div>


<div>
<div class="container m-auto">
  <div class="">
    <div class="card m-auto" style="max-width: 700px; max-height: 500px;">
      <div class="row">
        <div class="col-md-4 offset-md-1">
          @if(!empty($sports->user->img_name))
            <div class='image-wrapper' style="width: 200px; height: 200px; border-radius: 50%; object-fit:cover; overflow: hidden;">
            <img src="{{ asset($sports->user->img_name) }}" style=" width: 100%;"> 
            </div>
          @else
            <div class='image-wrapper' style="width: 200px; height: 200px; border-radius: 50%; object-fit:cover; overflow: hidden;">
            <img src="{{ Gravatar::src($sports->user->email) }}" style=" width: 100%;">
            </div>
          @endif
          　<div class="card-text text-center">{{ $user->introduce }}</div>
        </div>

   
        <div class="col-md-6 offset-md-1">
          <div class="card-header text-center">{{ $sports->caption }}</div>
            <div class="row justify-content-around">
                <div class="card-text">場所:{{ $sports->place }}</div>
                <div class="card-text">値段:{{ $sports->cost }}円</div>
            </div> 
            <br>
            <div class="card-header text-left">
                コメント
            </div> 
            <div class="">
                <div class="card-text">{{ $sports->comment }}</div>
            </div>
        </div>
      </div>
  

        @if(Auth::id() == $user->id)
            <div class="text-center">
            <a class="btn btn-primary mb-1" href="/home/{{ $sports->sport }}/edit/{{ $user->id }}/{{ $sports->id }}">投稿編集</a>
            </div>
    
            <div class="text-center">
            <form action="/home/delete/{{ $sports->id }}" method="POST">
            {{ csrf_field() }}
                <div class="destroy">
                    <button type="submit" class="btn btn-danger btn-sm">投稿削除</button>
                </div>
            </form>
            </div>
        @else
        
            <!-- マッチしたユーザにリクエストを送る処理 -->
            <!-- それぞれのstatus状況でボタン表示を変えたい（デフォルト値は2にしたい） -->
            <div class="text-center"> 
            @if(is_null($checkReaction))
                <a href="/like/{{ $user->id }}/{{ Auth::user()->id }}/1" class="btn btn-primary btn-sm mb-1">参加リクエスト</a>
            @elseif($checkReaction->status == 0)
                <button class="btn btn-danger btn-sm mb-1" disabled="disabled">マッチしました</a>
            @elseif($checkReaction->status == 1)
                <button class="btn btn-primary btn-sm mb-1" disabled="disabled">リクエスト送信済み</button>
            @endif
            </div>
        @endif
       
    </div>   
  </div>
</div>



@endsection