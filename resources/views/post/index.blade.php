@extends('layouts.app')


@section('content') 



<div class="containter text-center">
    <h1>プレイヤーを探そう</h1>    
</div>

@if (session('flash_message'))
    <div class="flash_message">
        {{ session('flash_message') }}
    </div>
@endif


@include('commons.icon')

@endsection



