@extends('layouts.layout')
<br>
<br>
<br>
<div class="container container-m">
    <div class="card-deck">
        <div class="col-md-6">
            <div class="card">
                <!-- 投稿画像 -->
                <img class="card-img-top" src=".../100px200/" alt="Rounded image">
                <div class="card-body">  
                     <!-- タイトル -->
                     <button type="button">{{ $posts->title }}</button>
                     <!-- コメント -->
                     <button type="button">{{ $posts->episode }}</button>
                     <!-- アイコン -->
                     <img class="rounded-circle" src="/images/pathToYourImage.png" alt="Circle image">
                     <!-- ユーザー名 -->
                     <button>{{ $posts->user->name }}</button>
                     <div>{{ $posts->date }}</div>
                </div>
            </div>
        </div>
    </div>
</div>


