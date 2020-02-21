@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">プロフィール</div>
                    <div class="card-body row pt-30">
                        @csrf
                        <div class="col-md-3 offset-md-1">
                        @if(!empty($user->img_name))
                          <div class='image-wrapper'><img src="{{ asset($user->img_name) }}" class="card-img rounded-circle" alt=""> </div>
                        @else
                            <div class='image-wrapper'><img src="{{ Gravatar::src($user->email, 500) }}" class="card-img rounded-circle" alt=""> </div>
                        @endif
                          <p class="card-text text-center">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-7 mt-5">
                          <dl class="row justify-content-around text-left">
                            <dt class="p-0 col-1">名前：</dt>
                            <dd class="col-5"><h5 class="card-title">{{ $user->name }}</h5></dd>
                          </dl>
                             <dl class="row justify-content-around text-left">
                            <dt class="p-0 col-3">自己紹介：</dt>
                            <dd class="col-6"><p class="card-text">{{ $user->introduce }}</p></dd>
                          </dl>
                          @if(Auth::id() == $user->id)
                          <dl class="row justify-content-around text-left">
                            <dt class="p-0 col-3">メールアドレス：</dt>
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
                            <form action="/delete/{{$user->id}}" method="DELETE">
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

<div>
  <h1>投稿一覧</h1>
  @foreach ($sports as $sport)
  <div class="col-6">
    <div class="row justify-content-around pb-5">
      <div class="card col-md-10 my-sm-2" style="max-width: 550px;">
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




<div class="row justify-content-center">
{{ $sports->links() }}
</div>
</div>

<a href="/home" class="row justify-content-center">戻る</a>
@endsection



