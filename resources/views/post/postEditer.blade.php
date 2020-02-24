@extends('layouts.app')


@section('content') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

　          <div class="card">
            <div class="card-header create_content">投稿編集</div>
            <div class="card-body">

            <form class="upload" id="new_post" action="/home/update/{{ $sports->id }}" method="POST">
           　　 {{ csrf_field() }}
    
                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">スポーツ</label>
                  <input type="text" name="sport" class="form-control col-sm-7" value="{{ $sports->sport }}">
                </div>

                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">キャプション</label>
                  <input type="text" name="caption" class="form-control col-sm-7" value="{{ $sports->caption }}">
                </div>

                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">場所</label>
                  <input type="text" name="place" class="form-control col-sm-7" value="{{ $sports->place }}">
                </div>

                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">値段</label>
                  <input type="text" name="cost" class="form-control col-sm-7" value="{{ $sports->cost }}">
                </div>

                <div class="form-group row">
                  <label for="group_name" class="col-sm-3">コメント</label>
                  <textarea name="comment" class="form-control col-sm-7" id="" cols="30" rows="10">{{ $sports->comment }}</textarea>
                </div>
            


                <div class="text-center">
                <button type="submit" class="btn btn-primary">編集する</button>
                </div>

                
            </form>
        
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<a href="/home" class="row justify-content-center pt-5">戻る</a>
@endsection