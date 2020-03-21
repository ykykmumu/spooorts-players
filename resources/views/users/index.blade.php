@extends('layouts.app')

@section('content')
<div class="matchingPage">
  <header class="header">
    <i class="fas fa-comments fa-3x"></i>
  </header>
  <div class="container">
    <div class="mt-5">
      <div class="matchingNum">{{ $match_users_count }}人とマッチングしています</div>
      <h2 class="pageTitle">マッチング</h2>
      <div class="matchingList">
				@foreach( $matching_users as $user)
          <div class="matchingPerson">
          <div class="matchingPerson_img">
            @if(!empty($user->img_name))
              <div class='chat_image'><img src="{{ asset($user->img_name) }}" class="rounded-circle img-responsive"　style= max-width: 10%;> </div>
            @else
              <div class='chat_image'><img src="{{ Gravatar::src($user->email, 100) }}" class="rounded-circle" style= max-width: 10%;> </div>
            @endif
          </div>
            <div class="matchingPerson_name">{{ $user->name }}</div>
            <form method="POST" action="{{ route('chat.show') }}">
            @csrf
              <input name="user_id" type="hidden" value="{{$user->id}}">
              <button type="submit" class="chatForm_btn">チャットを開く</button>
            </form> 
          </div>
        @endforeach

        <div class="requestNum">{{ $request_users_count }}人がリクエストしています</div>
        <h2 class="pageTitle">リクエスト</h2>
      <div class="matchingList">
				@foreach( $request_users as $user)
          <div class="matchingPerson">
          <div class="matchingPerson_img">
            @if(!empty($user->img_name))
              <div class='chat_image'><img src="{{ asset($user->img_name) }}" class="rounded-circle img-responsive"　style= max-width: 10%;> </div>
            @else
              <div class='chat_image'><img src="{{ Gravatar::src($user->email, 100) }}" class="rounded-circle" style= max-width: 10%;> </div>
            @endif
          </div>
            <div class="matchingPerson_name">{{ $user->name }}</div>
            <form method="POST" action="">
              <!-- 押したらstatusをupdateしてリロードしてマッチの方に移動させる -->
            @csrf
              <input name="user_id" type="hidden" value="{{$user->id}}">
              <button type="submit" class="chatForm_btn">承認する</button>
            </form> 
          </div>
        @endforeach
      </div>
      </div>
    <div>
  </div>
</div>
@endsection