@extends('layouts.layout')
<br><br><br>

<div>
    <div class="container container-m">
        <div>
            <h3>スポット情報</h3>
        </div>
        <div class="row">
            <div class="">名称:</div>
            <div>{{ $spots->name}}</div>
        </div>
        <div class="row">
            <div>所在地:</div>
            <div>{{ $spots->address }}</div>
        </div>
        <a href="{{ $spots->url}}">{{ $spots->url}}</a>
    </div>
    <form action="{{ route('posts.store')}}" >
    
    <div class="container container-m">
        <div　class="container">
            <h1>エピソード登録</h1>
        </div>
        <div class="row justify-content-center">
                <div class="container">
                    <div>タイトル</div>
                    <input type="text" name="title" id="">
                </div>
                <div class="container">
                    <div>日付</div>
                    <input type="date" name="date" id="">
                </div>
                <div class="container">
                    <div>評価登録</div>
                    <input type="text" name="evolution" id="">
                </div>
                <div class="container">
                    <div>画像</div>
                    <input type="text" name="image" id="">
                </div>
                <div class="container">
                    <div>コメント</div>
                    <input type="text" name="episode" id="">
                </div>
                
                
            <div class="container">
                <button type="submit" class="btn btn-lg">投稿内容確認</button>
            </div>
        </div>
        
    </div>
    </form>
    <div class="container">
            <a href="{{ route('posts.spot')}}" class="col ">
                <button class="btn btn-lg">スポット登録に戻る</button>
            </a>
    </div>
</div>