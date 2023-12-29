@extends('layouts.layout')
<br><br><br>
<div>
    <div>
        <div>
            <div>
                <div>
                    <div>スポット情報</div>
                </div>
                <div>
                    <div>名称：</div>
                    <div></div>
                </div>
                <div>
                    <div>所在地</div>
                    <div></div>
                </div>   
            </div>
            <div><map name=""></map></div>
        </div> 
        <div>
            <div>
                <div>タイトル</div>
                <div>{{ $posts->title}}</div>
                <div>日付</div>
                <div>{{ $posts->date}}</div>
                <div>評価</div>
                <div>{{ $posts->evolution}}</div>
                <div>コメント</div>
            </div>
            <div>画像</div>
            <img src="{{ url(\Storage::disk('public')->url($image ?? '')) }}">

        </div>
    </div>
    <div>
        <button>編集画面に戻る</button>
        <button>投稿する</button>
    </div>
</div>