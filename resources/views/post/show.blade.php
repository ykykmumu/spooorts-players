@extends('layouts.app')


@section('content') 


<div class="containter text-center">
    <h1>プレイヤーを探そう</h1>
@foreach ($sports as $sport)
@if ($loop->first)
    <form method="GET" class="form-group search_form" action="/home/{{ $sport->sport }}" target="">
      <div class="form-group search_form row">
        <label for="group_name" class="">ユーザ名</label>
        <input type="text" name="keyword" class="form-control">
        <input type="submit" value="検索する" class="btn btn-primary btn-block search_btn" style="width:80px";>
      </div>
    </form>
@endif
@endforeach
</div>



<div class="container row m-auto">
@foreach ($sports as $sport)
  @if ($loop->first)
    <div class="container_title col-12">
      <h1 class="text-center">{{ $sport->sport }}</h1>
    </div>
  @endif
  <div class="col-6">
    <div class="row justify-content-around pb-5">
      <div class="card col-md-10 my-sm-2" style="max-width: 550px;">
        <div class="row">
          <div class="col-md-4">
            <a href="{{ route('profile',['id'=>$sport->user_id]) }}"><img src="http://placehold.jp/150x150.png" class="card-img rounded-circle" alt=""></a>
            <div class="card-text text-center">{{$sport->user->name}}</div> 
          </div>
          <div class="col-md-7 offset-md-1">
            <div class="card-header text-center"><a href="{{ $sport->sport }}/person/{{$sport->user->id}}">{{ $sport->caption }}</a></div>
              <div class="row justify-content-around">
                <div class="card-text"><a href="/home/{{ $sport->sport }}/person/{{$sport->user->id}}">{{ $sport->place }}</a></div>
                <div class="card-text"><a href="/home/{{ $sport->sport }}/person/{{$sport->user->id}}">{{ $sport->cost }}円</a></div>
              </div>
            <div class="text-left">
                自己紹介  
            </div> 
            <div class="">
              <div class="card-text">{{$sport->user->introduce}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
</div>




<div class="row justify-content-center">
{{ $sports->links() }}
</div>

<a href="/home" class="row justify-content-center">戻る</a>

@endsection


