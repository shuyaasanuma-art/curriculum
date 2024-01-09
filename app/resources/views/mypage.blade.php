@extends('layouts.layout')
<br>
<br>
<br>

<div class="container container-m">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div>{{ optional($users)->image ??''}}</div>
                    <h4>フォロー</h4>
                    <h4>フォロワー</h4>
                </div>
                <div>
                    <div>{{ optional($users)->name ??''}}</div>
                    <div placeholder="プロフィール">{{ optional($users)->profile ??''}}</div>
                </div>
            </div>
            <div class="col">
                <a href="{{ route('posts.spot')}}">
                    <button type="button" class="btn btn-sm">新規投稿</button>
                </a>
                <br>
                <a href="{{ route('users.create')}}">
                    <button type="button" class="btn btn-sm">ユーザー情報編集</button>
                </a>               
            </div>
        </div>
        
    </div>
    <div class="container">
        <div class="row">
            <a class="col" href="{{route('users.index')}}">
                <button class="btn btn-lg">自分の投稿一覧</button>
            </a>
            
            <div class="col"></div>
            <button class="col btn btn-lg">いいねした投稿一覧</button>
        </div>
    </div>
    <div class="container">
    <div class="row row-cols-3">
        @foreach($posts as $post)
            @include('layouts.layout_post')
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