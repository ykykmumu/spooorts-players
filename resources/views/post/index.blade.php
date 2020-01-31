@extends('layouts.app')


@section('content') 

<div class="containter text-center">
    <h1>プレイヤーを探そう</h1>
    
</div>


<ul class="list">
                <div class="list_content">
                    <ul class="row justify-content-around">
                    <li class="list_item"><a href="/home/baseball">野球 <img src="{{asset('temp/baseball.png')}}" alt="" class="list_item"></a></li>
                    <li class="list_item"><a href="/home/soccer">サッカー <img src="{{asset('temp/golf.png')}}" alt="" class="list_item"></a></li>
                    <li class="list_item"><a href="/home/tennis">テニス <img src="{{asset('temp/tennis.png')}}" alt="" class="list_item"></a></li>
                    <li class="list_item"><a href="/home/rugby">ラグビー <img src="{{asset('temp/basketball.png')}}" alt="" class="list_item"></a></li>
                    <li class="list_item"><a href="/home/baseball">野球 <img src="{{asset('temp/rugby.png')}}" alt="" class="list_item"></a></li>
                    <li class="list_item"><a href="/home/swimming">水泳 <img src="{{asset('temp/soccer.png')}}" alt="" class="list_item"></a></li>
                    <li class="list_item"><a href="/home/basketball">バスケットボール <img src="{{asset('temp/soccer.png')}}" alt="" class="list_item"></a></li>
                    <li class="list_item"><a href="/home/golf">ゴルフ <img src="{{asset('temp/soccer.png')}}" alt="" class="list_item"></a></li>
                    <li class="list_item"><a href="/home/judo">柔道 <img src="{{asset('temp/soccer.png')}}" alt="" class="list_item"></a></li>
                    </ul>
                </div>
</ul>


@endsection



