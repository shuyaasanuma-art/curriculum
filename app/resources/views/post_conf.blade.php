@extends('layouts.layout')
<br><br><br>
<div>
    <div>
        <div  class="container container-lg">
            <div>
                <div>
                    <h4 class="font-weight-bolder">スポット情報</h4>
                </div>
                <div class="row">
                    <h5>名称：</h5>
                    <h5>{{ $posts->spot->name}}</h5>
                </div>
                <div class="row">
                    <h5>所在地:</h5>
                    <h5>{{$posts->spot->address}}</h5>
                </div>   
            </div>
        
        </div> 
        <div  class="container container-lg">
            <div class="row">
                 <div class="col 6">
                <h5>タイトル</h5>
                <h5>{{ $posts->title}}</h5>
                <h5>日付</h5>
                <h5>{{ $posts->date}}</h5>
                <h5>評価</h5>
                <h5>{{ $posts->evolution}}</h5>
                <h5>コメント</h5>
                <h5>{{ $posts->episode}}</h5>
            </div>
            <div class="col">
            <img src="{{ Storage::url($posts->image)}}" width="50%">
            </div>
            </div>
            
            

        </div>
    </div>
    <div class="container">
        <div class="row">
            <form action="{{ route('spots.store',$posts->spot->id)}}" class="col">
                <button class="btn btn-lg">直す！！！編集画面に戻る</button>
            </form>
           
            <div class="col"></div>
            <a href="{{ route('users.index')}}" class="col ">
                <button class="btn btn-lg">ここで保存に直す！投稿する</button>
            </a>
        </div>  
    </div>
</div>