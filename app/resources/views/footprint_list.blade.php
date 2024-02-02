@extends('layouts.layout')
<br>
<br>
<br>

<div class="container container-m">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="row">
                    <img src="{{ Storage::url(optional($users)->image)}}" class="rounded-circle"  width="150" height="150">
                    <div class="ml-5 align-self-center">
                        <div><h5>{{ optional($users)->name ??''}}</h5></div>
                        <div placeholder="プロフィール" class="align-self-center">{{ optional($users)->profile ??''}}</div>
                    </div>
                </div>
            </div>
            <div class="col align-self-center">
                <a href="{{ route('posts.spot')}}">
                    <button type="button" class="btn "><h4>新規投稿</h4></button>
                </a>
                <br>
                <a href="{{ route('users.create')}}">
                    <button type="button" class="btn "><h4>ユーザー情報編集</h4></button>
                </a>               
            </div>
        </div>
        
    </div>
    <div class="container">
        <div class="row">
            <a class="col align-self-center" href="{{route('users.index')}}">
                <button class="btn btn-lg"><h3>自分の投稿一覧</h3></button>
            </a>
            <div class="col"></div>
            <a class="col align-self-center" href="{{ route('likefoot')}}">
                <button class="btn btn-lg"><h3>いいねした投稿一覧</h3></button>
            </a>
        </div>
    </div>
    <div class="container">
    <div class="row row-cols-3">
        @foreach($posts as $post)
            @include('layouts.layout_post_like')
        @endforeach
    </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col"></div>
            <div class="col">{{ $posts->links() }}</div>
            <div class="col"></div>
        </div>
    </div>
</div>