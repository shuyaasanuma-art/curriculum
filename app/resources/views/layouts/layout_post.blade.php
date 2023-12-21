@extends('layouts.layout')
<br>
<br>
<br>
<div class="container container-m">
    <div class="card-deck">
        <div class="col-xl-20">
            <div class="card">
                <!-- 投稿画像 -->
                <button class="card-img-top p-5" src="sample.png" alt="Rounded image">{{ $posts->image }}</button>
                <div class="card-body">  
                    <div>
                        <!-- タイトル -->
                        <button type="button" class="btn btn-link">{{ $posts->title }}</button>
                        <!-- ユーザー名 -->
                        <button class="btn btn-link">{{ $posts->user->name }}</button>
                        <div>{{ $posts->date }}</div>
                    </div>
                     <!-- コメント -->
                     <button type="button" class="btn btn-link">{{ $posts->episode }}</button>
                     
                </div>
            </div>
        </div>
    </div>
</div>


