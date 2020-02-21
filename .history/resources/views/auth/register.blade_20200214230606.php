@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

　          <div class="card">
                <div class="signupPage">
                    <div class="card-header">新規登録</div>
                    <div class="card-body">

                        <form method="POST" action="{{route('register')}}" class="text-center" enctype="multipart/form-data" >
                    　　 {{ csrf_field() }}
                            <label for="file_photo" class="rounded-circle userProfileImg">
                                <div class="userProfileImg_description">画像をアップロード</div>
                                <i class="fas fa-camera fa-3x"></i>
                                <input type="file" id="file_photo" name="img_name">
                            </label>
                                <div class="userImgPreview" id="userImgPreview">
                                    <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
                                    <p class="userImgPreview_text">画像をアップロード済み</p>
                                </div>
                        
                    
                            <div class="form-group row @error('name')has-error @enderror">
                                @error('name')
                                <span class="errorMessage col-9 offset-3 text-left">
                                {{ $message }}
                                </span> 
                                @enderror
                                <label for="name" class="col-sm-3">名前 </label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control col-sm-7" placeholder="名前を入力してください">
                            </div>
                            <div class="form-group row @error('email')has-error @enderror">
                                @error('email')
                                <span class="errorMessage col-9 offset-3 text-left">
                                {{ $errors }}
                                </span>
                                @enderror
                                <label for="email" class="col-sm-3">メールアドレス </label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control col-sm-7" placeholder="メールアドレスを入力してください">
                            </div>
                            <div class="form-group row @error('password')has-error @enderror">
                                @error('password')
                                <span class="errorMessage col-9 offset-3 text-left">
                                {{ $message }}
                                </span>
                                @enderror
                                <label for="password" class="col-sm-3">パスワード </label>
                                <input type="password" name="password"  class="form-control col-sm-7" placeholder="パスワードを入力してください">
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-3">パスワード確認 </label>
                                <input type="password" name="password_confirmation" class="form-control col-sm-7" placeholder="パスワードを再度入力してください">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn submitBtn">はじめる</button>
                            </div>
                            <div class="linkToLogin">
                                <a href="{{ route('login') }}">ログインはこちら</a>
                            </div>
                        </form>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
