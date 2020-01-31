@extends('layouts.app')


@section('content') 


<div class="containter text-center">
    <h1>プレイヤーを探そう</h1>
    
    <form method="GET" class="form-group" action="/home/{sport}" target="">
      <input type="text" name="keyword">
      <input type="submit" value="検索する">
    </form>
</div>


@foreach ($sports as $sport)
<div class="container">
  <div class="container_title">
  @if ($loop->first)
        <h1 class="text-center">{{ $sport->sport }}</h1>
  @endif
  </div>
  
  <div class="row justify-content-between">
    <div class="card col-md-7 my-sm-5" style="max-width: 500px;">
      <div class="row">
        <div class="col-md-4">
          <a href="{{ route('profile',['id'=>$sport->user->id]) }}"><img src="http://placehold.jp/150x150.png" class="card-img rounded-circle" alt=""></a>
          <div class="card-text text-center">{{$sport->user->name}}</div>
        </div>
        <div class="col-md-6 offset-md-2">
          <div class="card-header"><a href="">{{ $sport->caption }}</a></div>
          <div class="card-body"><a href="/home/{sport}/person/{{$sport->user->id}}">{{ $sport->place }}</a></div>
          <div class="card-text"><a href="/home/{sport}/person/{{$sport->user->id}}">{{ $sport->cost }}</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach


<div class="row justify-content-center">
{{ $sports->links() }}
</div>

<a href="/home" class="row justify-content-center">戻る</a>

@endsection

