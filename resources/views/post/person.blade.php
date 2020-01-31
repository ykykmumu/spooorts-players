@extends('layouts.app')

@section('content')

<div class="containter text-center">
    <h1>ユーザ名</h1>
</div>

<div class="container">
  <div class="row justify-content-center">
  
  <div class="card col-md-6 my-sm-5" style="max-width: 700px;">
    <div class="row">
      <div class="col-md-4">
      <img src="http://placehold.jp/150x150.png" class="card-img rounded-circle" alt="">
        <div class="card-text text-center">{{ $sport->sport }}</div>
      </div>
      <div class="col-md-6 offset-md-2">
        <div class="card-header"><a href="">{{ $sport->caption }}</a></div>
        <div class="card-body"><a href="">{{ $sport->place }}</a></div>
        <div class="card-text"><a href="">{{ $sport->cost }}</a></div>
      </div>
    </div>
  </div>
 
  </div>
</div>


@endsection