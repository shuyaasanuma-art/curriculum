@extends('layouts.layout')
<br><br><br>
<div class="col-md-5 mx-auto">
    <div class="card">
        <h1>管理者ページ</h1>
        <a href="{{route('owners.user')}}">
            <button>ユーザー検索</button>
        </a>
        <a href="{{route('owners.post')}}">
            <button>投稿検索</button>
        </a>
  
    </div>
</div>