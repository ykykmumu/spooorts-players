@extends('layouts.app')
@section('content')
<div class="chatPage">
  <header class="header">
  <a href="{{route('matching')}}" class="linkToMatching"></a>
    <div class="chatPartner">
      <div class="chatPartner_img">
            @if(!empty($user->img_name))
              <div class='chat_image'><img src="{{ asset($chat_room_user->img_name) }}" class="img-responsive"　style= "max-width: 100%";> </div>
            @else
              <div class='chat_image'><img src="{{ Gravatar::src($chat_room_user->email, 100) }}" class="" style= "max-width: 100%";> </div>
            @endif
      </div>
      <div class="chatPartner_name">{{ $chat_room_user -> name }}</div>
    </div>
  </header>
  <div class="container">
    <div class="messagesArea messages">
    @foreach($chat_messages as $message)
    <div class="message">
      @if($message->user_id = Auth::id())
        <span>{{Auth::user()->name}}</span>
      @else
        <span>{{$chat_room_user_name}}</span>
      @endif
      <div class="commonMessage">
        <div>
        {{$message->message}}
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </div>
  <form class="messageInputForm">
    <div class='container'>
      <input type="text" data-behavior="chat_message" class="messageInputForm_input" placeholder="メッセージを入力...">
    </div>
  </form>
</div>
<script>
var chat_room_id = {{ $chat_room_id }};
var user_id = {{ Auth::user()->id }};
var current_user_name = "{{ Auth::user()->name }}";
var chat_room_user_name = "{{ $chat_room_user_name }}";
</script>

<style>
  .footer{
    width: 100%;
    display: block;
    position: fixed;
    bottom: 0;
    line-height: 5vh;
  }
</style>


@endsection