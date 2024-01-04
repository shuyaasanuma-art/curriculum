@extends('layouts.layout')
<br>
<br>
<br>
<div class="container container-m">
    <div class="card-deck">
        <div class="col-xl-20">
            <div class="card">
                <!-- 投稿画像 -->
                <button><img src="{{ Storage::url($post->image)}}" class="card-img-top p-5" alt="Rounded image" width="20%"></button>
                <div class="card-body">  
                    <div>
                        <!-- タイトル -->
                        <a href="{{route('posts.show',$post->id)}}"　method="get">
   
                           <button class="btn btn-link">{{ $post->title }}</button>
                        </a>
                        <!-- ユーザー名 -->
                        <a href="{{route('posts.show',$post->id)}}"　method="get">
                            <button class="btn btn-link">{{ $post->name }}</button>
                        </a>
                        <div>{{ $post->date }}</div>
                    </div>
                     <!-- コメント -->
                    <a href="{{route('posts.show',$post->id)}}"　method="get">
                        <button class="btn btn-link">{{ $post->episode }}</button>
                    </a>
                     
                     
                </div>
            </div>
        </div>
    </div>
</div>


