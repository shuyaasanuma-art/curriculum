@extends('layouts.layout')
<br><br><br>
<div>
    <div>
    <form action="{{ route('posts.edit',$posts->id)}}" method="get">
    @csrf
        <div  class="container container-lg border">
            <div class="m-5">
                <div>
                    <h4 class="font-weight-bolder">スポット情報</h4>
                </div>
                <div class="row">
                    <h5>名称：</h5>
                    <h5> $spots->name</h5>
                </div>
                <div class="row">
                    <h5>所在地:</h5>
                    <h5>$spots->address</h5>
                </div>   
            </div>
        
        </div> 
        <div class="container container-lg border">
            <div class="row m-2">
                <div class="col"><h1>$users->image</h1></div>
                <div class="col">$users->name</div>
                <div class="col">いいね数</div>
                <button type="submit">投稿編集</button>                
            </div>
        </div>
        <div class="container container-lg border">
            <div class="row m-5">
                 <div class="col-6">
                 <!-- アイコン画像 -->
                <h5>タイトル</h5>
                <h5>{{ $posts->title}}</h5>
                <h5>日付</h5>
                <h5>{{ $posts->date}}</h5>
                <div class="row">
                    <h5 class="col">評価</h5>
                    <h5 class="col">{{ $posts->evolution}}</h5>
                </div>
                
                <h5>コメント</h5>
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