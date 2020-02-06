@extends('layouts.app')


@section('content') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

　          <div class="card">
            <div class="card-header create_content">新規投稿</div>
            <div class="card-body">

            <form class="upload" id="new_post" action="{{ url('posts') }}" method="POST">
           　　 {{ csrf_field() }}

           <div class="form-group row">
                  <label for="group_name" class="col-sm-3">スポーツ</label>
                  <select name="sport" class="form-control col-sm-7" value="">
                    <option value=""></option>
                    <option value="golf">ゴルフ</option>
                    <option value="baseball">野球</option>
                    <option value="basketball">バスケ</option>
                    <option value="soccer">サッカー（フットサル）</option>
                    <option value="rugby">ラグビー</option>
                    <option value="volleyball">バレーボール</option>
                    <option value="badminton">バドミントン</option>
                    <option value="tabletennis">卓球</option>
                    <option value="volleyball">バレーボール</option>
                  </select>
                </div>

                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">キャプション</label>
                  <input type="text" name="caption" class="form-control col-sm-7" value="">
                </div>

                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">場所</label>
                  <input type="text" name="place" class="form-control col-sm-7" value="">
                </div>

                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">値段</label>
                  <input type="text" name="cost" class="form-control col-sm-7" value="">
                </div>
                
                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">コメント</label>
                  <textarea name="comment" id="" cols="30" rows="10" class="form-control col-sm-7"></textarea>
                </div>

                <div class="text-center">
                <button type="submit" class="btn btn-primary">投稿する</button>
                </div>
            </form>
        
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
<a href="/home" class="row justify-content-center">戻る</a>
@endsection





