@extends('layouts.app')


@section('content') 

<div class="containter text-center">
    <h1>プレイヤーを探そう</h1>
    
</div>


一つの投稿しか反映されない
ページネーション
tinkerで作った物しか反映されていない

<ul class="list">
                <li class="list_content">
                <a href="/home/baseball">野球 <img src="http://placehold.jp/150x150.png" alt=""></a>
                <a href="/home/tennis">テニス <img src="http://placehold.jp/150x150.png" alt=""></a>
                <a href="/home/soccer">サッカー <img src="http://placehold.jp/150x150.png" alt=""></a>
                <a href="/home/rugby">ラグビー <img src="http://placehold.jp/150x150.png" alt=""></a>
                <a href="/home/swimming">水泳 <img src="http://placehold.jp/150x150.png" alt=""></a>
                <a href="/home/basketball">バスケットボール <img src="http://placehold.jp/150x150.png" alt=""></a>
                <a href="/home/golf">ゴルフ <img src="http://placehold.jp/150x150.png" alt=""></a>
                </li>




                <!-- <li class="list_content">
                
                </li>

                <li class="list_content">
                    <div class="img"><figure><img src="http://placehold.jp/150x150.png" alt=""></figure></div>
                    <div class="txt col-sm-10">
                        <p class="date">投稿日時</p>
                        <h4>キャプション</h4>
                        <h4>場所</h4>
                        <h4>値段</h4>
                    </div>
                </li>

                <li class="list_content">
                    <div class="img"><figure><img src="http://placehold.jp/150x150.png" alt=""></figure></div>
                    <div class="txt col-sm-10">
                        <p class="date">投稿日時</p>
                        <h4>キャプション</h4>
                        <h4>場所</h4>
                        <h4>値段</h4>
                    </div>
                </li> -->
</ul>


@endsection

