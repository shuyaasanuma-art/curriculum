@extends('layouts.layout')
<br><br><br>
<div>
    <div>
    <form action="{{ route('posts.destroy',$posts)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <div class="container container-lg row">
        <div class="col">
            <h3>こちらの投稿を削除してもよろしいですか？</h3>
        </div>
        <div class="col">
            <button type="submit">削除する</button>
        </div>
        <div class="col">
            <a href="{{ route('posts.edit',$posts->id)}}">
                編集画面に戻る
            </a>
        </div>
    </div>
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
                    <h5><a href="{{$posts->spot->address}}">登録したスポット</a></h5>
                </div> 
            </div>
        
        </div> 
        <div class="container container-lg border">
            <div class="row m-2">
                <div class="col"><img src="{{ Storage::url($posts->user->image)}}" width="100" height="100"></div>
                <div class="col"><h4>{{$posts->user->name}}</h4></div>
                <div class="col">いいね数</div>       
            </div>
        </div>
        <div class="container container-lg border">
            <div class="row m-5">
                   <div class="col-6">
                        <!-- アイコン画像 -->
                        <div  hidden>
                            <input type="text" name="title" value="{{ $posts->title}}">
                            <input type="date" name="date" value="{{ $posts->date}}">
                            <input type="text" name="evolution" value="{{ $posts->evolution}}">
                            <input type="text" name="episode" value="{{ $posts->episode}}">
                            <input type="text" name="image" value="{{ $posts->image}}">
                        </div>
                        <h4 class="font-weight-bolder">{{ $posts->title}}</h4>
              
                        <h5>{{ $posts->date}}</h5>
                        <div class="row">
                            <h5 class="col">評価</h5>
                            <h5 class="col-10">{{ $posts->evolution}}</h5>
                        </div>
                        <h5>{{ $posts->episode}}</h5>
                    </div>
                    <div class="col">
                        <img src="{{ Storage::url($posts->image)}}" width="100">
                    </div>
            </div>
        </div>
    </div>
    
    </form>
  
</div>