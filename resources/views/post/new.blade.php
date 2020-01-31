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
                  <input type="text" name="sport" class="form-control col-sm-7" value="">
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





