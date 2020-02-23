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
        <div class="col-md-4">
          @if(!empty($sports->user->img_name))
            <div class='image-wrapper'><img src="{{ asset($sports->user->img_name) }}" class="card-img rounded-circle img-responsive"　style= max-width: 100%;> </div>
          @else
            <div class='image-wrapper'><img src="{{ Gravatar::src($sports->user->email, 500) }}" class="card-img rounded-circle"> </div>
          @endif
          　<div class="card-text text-center">{{ $user->introduce }}</div>
        </div>

   
        <div class="col-md-7 offset-md-1">
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
           
           
        @endif 
    </div>   
  </div>
</div>



@endsection