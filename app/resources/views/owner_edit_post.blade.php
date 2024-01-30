@extends('layouts.layout')
<br><br><br>
<div>
    <div>
        <form action="{{ route('owners.postedit',$posts->id)}}"  method="post"  enctype="multipart/form-data">
    @csrf
    <div class="container container-m">
        <div　class="container">
            <h1>エピソード登録</h1>
        </div>
        <div hidden>
            
        </div>
        <div class="row justify-content-center">
                <div class="container">
                    <div>タイトル</div>
                    <input type="text" name="title" id="" placeholder="{{$posts->title}}">
                </div>
                <div class="container">
                    <div>日付</div>
                    <input type="date" name="date" id="" placeholder="{{$posts->date}}">
                </div>
                <div class="container">
                    <div>５段階評価登録</div>
                    <input type="number" min="1" max="5" name="evolution" id="" placeholder="{{$posts->evolution}}">
                </div>
                <div class="container">
                    <div>画像</div>
                    <input type="file" name="image">
                    <img src="{{ Storage::url(optional($posts)->image)}}" class="rounded-circle"  width="150" height="150" alt="">
                </div>
                <div class="container">
                    <div>コメント</div>
                    <textarea type="text" name="episode" id="" placeholder="{{$posts->episode}}"></textarea>
                </div>                
                <div hidden></div>
            <div class="container">
                <input type="submit" name="button" class="btn btn-lg" value="変更完了">
            </div>
        </div>
    </div>
    </form>
    </div>
</div>