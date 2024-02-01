@extends('layouts.layout')
<br><br><br>
<div>
    <div>
    <form action="{{ route('posts.edit',$posts)}}" method="get">
    @csrf
        <div  class="container container-lg border">
            <div class="m-5">
                <div>
                    <h4 class="font-weight-bolder">スポット情報</h4>
                </div>
                <div class="row">
                    <h5>名称:</h5>
                    <h5> {{$posts->spot->name}}</h5>
                </div>
                <div class="row">
                    <h5>所在地:</h5>
                    <h5>{{$posts->spot->address}}</h5>
                </div>   
                <div class="row">
                    <h5>URL:</h5>
                    <h5><a href="{{$posts->spot->url}}">登録したスポット</a></h5>
                </div> 
            </div>
        
        </div> 
        <div class="container container-lg border">
            <div class="row m-2">
                <div class="col"><img src="{{ Storage::url(optional($posts->user)->image)}}" width="100" height="100"></div>
                <div class="col"><h4>{{$posts->user->name}}</h4></div>
                <div class="col">いいね数{{$posts->likes_count}}</div>
                <div class="col">
                    <span class="float-center">
                        @if($posts->user_id === Auth::user()->id)
                            <button type="submit">投稿編集</button> 
                        @endif   
                    </span>
                   
                </div>
                <!-- ユーザーと投稿のidが一致した時 -->
                             
            </div>
        </div>
        <div class="container container-lg border">
            <div class="row m-5">
                   <div class="col-6">
                        <!-- アイコン画像 -->
                
                        <h4 class="font-weight-bolder">{{ $posts->title}}</h4>
              
                        <h5>{{ $posts->date}}</h5>
                        <div class="row">
                            <h5 class="col">評価</h5>
                            <h5 class="col-10">{{ $posts->evolution}}</h5>
                        </div>
                        <h5>{{ $posts->episode}}</h5>
                    </div>
                    <div class="col">
                        <img src="{{ Storage::url($posts->image)}}" width="100%">
                    </div>
            </div>
        </div>
    </div>
    </form>

</div>