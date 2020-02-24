@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">プロフィール</div>
                    <div class="card-body row pt-30">
                       
                        <div class="col-md-3 offset-md-1 ">
                        @if(!empty($user->img_name))
                          <div class='image-wrapper m-0 mt-1'><img src="{{ asset($user->img_name) }}" class="card-img rounded-circle" alt=""> </div>
                        @else
                            <div class='image-wrapper m-0 mt-1'><img src="{{ Gravatar::src($user->email, 500) }}" class="card-img rounded-circle" alt=""> </div>
                        @endif
                          <p class="card-text text-center">{{ $user->name }}</p>
                        </div>

                        <div class="profile col-md-7 offset-md-1 mt-5">
                          <dl class="row justify-content-around text-center">
                            <dt class="p-0 col-5 offset-1">名前：</dt>
                            <dd class="col-6"><h5 class="card-text">{{ $user->name }}</h5></dd>
                          </dl>
                          <dl class="row justify-content-around text-center">
                            <dt class="p-0 col-5 offset-1">自己紹介：</dt>
                            <dd class="col-6"><p class="card-text">{{ $user->introduce }}</p></dd>
                          </dl>
                          @if(Auth::id() == $user->id)
                          <dl class="row justify-content-around text-center">
                            <dt class="p-0 col-5 offset-1">メールアドレス：</dt>
                            <dd class="col-6"><p class="card-text">{{ $user->email }}</p></dd>
                          </dl>
                          @endif
                        </div>     
                    </div>

                        @if(Auth::id() == $user->id)
                          <div class="text-center">
                            <a class="btn btn-primary btn-sm mb-1" href="/edit/{{$user->id}}">プロフィールの編集</a>
                          </div>
                          <div class="text-center">
                            <form action="/delete/{{$user->id}}" method="POST">
                            {{ csrf_field() }}
                              <div class="destroy">
                                  <button type="submit" class="btn btn-danger">アカウント削除</a>
                              </div>
                            </form>
                          </div>
                        @endif   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mypost">
  <h1 class="container myposttitle pt-10">投稿一覧</h1>
  <div class="row">
    @foreach ($sports as $sport)
        <div class="col-6">
          <div class="row justify-content-around pb-5">
            <div class="card col-md-9 my-sm-3" style="max-width: 550px;">
              <div class="row">

                <div class="col-md-4">
                @if(!empty($sport->user->img_name))
                  <div class='image-wrapper'><img src="{{ asset($sport->user->img_name) }}" class="card-img rounded-circle" alt=""> </div>
                @else
                  <div class='image-wrapper'><img src="{{ Gravatar::src($sport->user->email, 500) }}" class="card-img rounded-circle" alt=""> </div>
                @endif
                  <div class="card-text text-center">{{$sport->user->name}}</div> 
                </div>

                <div class="col-md-7 offset-md-1">
                    <div class="card-header text-center"><a href="/home/{{ $sport->sport }}/person/{{$sport->user->id}}/{{ $sport->id }}">{{ $sport->caption }}</a></div>
                    <div class="row justify-content-around">
                      <div class="card-text"><a href="/home/{{ $sport->sport }}/person/{{$sport->user->id}}/{{ $sport->id }}">{{ $sport->place }}</a></div>
                      <div class="card-text"><a href="/home/{{ $sport->sport }}/person/{{$sport->user->id}}/{{ $sport->id }}">{{ $sport->cost }}円</a></div>
                    </div>
                  <div class="text-left">
                      自己紹介  
                  </div> 
                  <div class="">
                    <div class="card-text">{{$sport->user->introduce}}</div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
    @endforeach
  </div>
</div>




<div class="row justify-content-center">
{{ $sports->links() }}
</div>


<a href="/home" class="row justify-content-center">戻る</a>
@endsection



