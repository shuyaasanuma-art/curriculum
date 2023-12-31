@extends('layouts.layout')
<br>
<br>
<br>

<div class="container container-m">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div>アイコン画像</div>
                    <h4>フォロー</h4>
                    <h4>フォロワー</h4>
                </div>
                <div>
                    <div>{{ $users->name }}</div>
                    <div>{{ $users->profile }}</div>
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
            <button class="col btn btn-lg">自分の投稿一覧</button>
            <div class="col"></div>
            <button class="col btn btn-lg">いいねした投稿一覧</button>
        </div>
    </div>
    <div class="container">
       <div class="row">
        <div class="col-4">@include('layouts.layout_post')</div>
        <div class="col-4">@include('layouts.layout_post')</div>
        <div class="col-4">@include('layouts.layout_post')</div>
       </div>
    </div>
    <br>
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#!" aria-label="Previous">
        <span aria-hidden="true">«</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#!">1</a></li>
    <li class="page-item"><a class="page-link" href="#!">2</a></li>
    <li class="page-item"><a class="page-link" href="#!">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#!" aria-label="Next">
        <span aria-hidden="true">»</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</div>