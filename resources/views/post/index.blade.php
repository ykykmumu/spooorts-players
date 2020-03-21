@extends('layouts.app')


@section('content') 



<div class="containter text-center">
    <h1>プレイヤーを探そう</h1>    
</div>

<!-- @if (session('flash_message'))
    <div class="flash_message">
    <div class="modal fade id="modal_box" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
            
                <div class="modal-body">
                {{ session('flash_message') }}
                </div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endif -->


@if (session('flash_message'))
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>
  $(window).load(function() {
  $('#modal_box').modal('show');
  });
</script>
 
<!-- モーダルウィンドウの中身 -->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
  </div>
  <div class="modal-body text-center">
  {{ session('flash_message') }}
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
  </div>
  </div>
  </div>
</div>
@endif


@include('commons.icon')

@endsection



