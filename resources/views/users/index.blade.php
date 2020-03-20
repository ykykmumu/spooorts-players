@extends('layouts.app')

@section('content')
<div class="matchingPage">
  <header class="header">
    <i class="fas fa-comments fa-3x"></i>
  </header>
  <div class="container">
    <div class="mt-5">
      <div class="matchingNum">
        {{ $match_users_count }}人とマッチングしています
      </div>
      <h2 class="pageTitle">マッチング</h2>
      <div class="matchingList row justify-content-around">
				@foreach( $matching_users as $user)
          <div class="matchingPerson">
            <div class="matchingPerson_img text-center">
              @if(!empty($user->img_name))
                <div class='chat_image'><img src="{{ asset($user->img_name) }}" class="rounded-circle img-responsive"　style= max-width: 10%;> </div>
              @else
                <div class='chat_image'><img src="{{ Gravatar::src($user->email, 100) }}" class="rounded-circle" style= max-width: 10%;> </div>
              @endif
            </div>
            <div class="matchingPerson_name text-center">
              {{ $user->name }}
            </div>
              <form class="text-center" method="POST" action="{{ route('chat.show') }}">
              @csrf
                <input name="user_id" type="hidden" value="{{$user->id}}">
                <button type="submit" class="chatForm_btn">チャットを開く</button>
              </form> 
          </div>
        @endforeach
      </div>
    </div>

      <div class="mt-5">
        <div class="requestNum ">
          {{ $request_users_count }}人がリクエストしています
        </div>
        <h2 class="pageTitle">リクエスト</h2>
        <div class="matchingList row justify-content-around">
          @foreach( $request_users as $user)
            <div class="matchingPerson">
              <div class="matchingPerson_img text-center">
                @if(!empty($user->img_name))
                  <div class='chat_image'><img src="{{ asset($user->img_name) }}" class="rounded-circle img-responsive"> </div>
                @else
                  <div class='chat_image'><img src="{{ Gravatar::src($user->email, 100) }}" class="rounded-circle"> </div>
                @endif
              </div>
              <div class="matchingPerson_name text-center">
                {{ $user->name }}
              </div>
        
              @foreach($user_ids as $user_ids)
                <form class="text-center" method="get" action="/update/{{ Auth::user()->id }}/{{ $user_ids["from_user_id"] }}/0">
                <!-- 　この数字を取れるようにしたらルートへ通せる -->
                  <!-- 押したらstatusをupdateしてリロードしてマッチの方に移動させる -->
                @csrf
                  <input name="user_id" type="hidden" value="{{$user->id}}">
                  <button type="submit" class="chatForm_btn">承認する</button>
                </form> 
                @endforeach
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection