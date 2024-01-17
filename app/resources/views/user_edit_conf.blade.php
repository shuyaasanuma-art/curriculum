@extends('layouts.layout')
<br><br><br>
<div class="container container-m">
    <div>
        <h3 class="text-align-center">アカウント情報編集内容確認</h3>
        <form action="{{ route('users.update',$users->id)}}" method="post" >
        @csrf
        @method('PUT')    
        <div hidden>
            <input type="text" name="name" value="{{ $users->name}}">
            <input type="text" name="email" value="{{ $users->email}}">
            <input type="text" name="password" value="{{ $users->password}}">
            <input type="text" name="image" value="{{ $users->image}}">
            <input type="text" name="profile" value="{{ $users->profile}}">
        </div>
        <div class="container">
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">ユーザー名</label>
                <div>{{ $users->name}}</div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">メールアドレス</label>
                <div>{{ $users->email}}</div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">パスワード</label>
                <div>{{ $users->password}}</div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">パスワード確認</label>
                <div>{{ $users->password}}</div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">画像</label>
                <img src="{{Storage::url(optional($users)->image)}}" width="150" height="150" alt="">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">プロフィール</label>
                <div>{{ $users->profile}}</div>
            </div>
            <button type="submit" class="btn btn-sm">登録する</button>
        </div>
        </form>
        <div>
            <a href="{{ route('users.create')}}">
                <button type="button" class="btn btn-sm">編集画面に戻る</button>
            </a> 
        </div>
    </div>
</div>