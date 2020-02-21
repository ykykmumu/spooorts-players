@extends('layouts.app')


@section('content') 
<div class="loginPage"> 
 
 <!-- <img class="logo" src="{{asset('temp/image1.jpg')}}" alt="logo"> -->
  <div class="loginPage_image">
   <div class="loginPage_contents">
   <h1 class="loginPage_contents_title">Players</h1>
    <h3 class="loginPage_contents_sentence">
      Players (プレイヤーズ)は<br>
      スポーツ仲間を見つけられる<br>
      サービスです。
    </h3>
   </div>

    <div class="btn loginPage_contents_btn">
    <a class="text-white" href="{{ route('register') }}">はじめる</a>
    </div> 
    
  </div>  
  <a href="https://pngtree.com/free-backgrounds">free background photos from pngtree.com</a>
</div> 

@include('commons.icon')

    
@endsection