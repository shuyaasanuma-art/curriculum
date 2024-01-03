@extends('layouts.layout')
<br><br><br>
<div class="container container-m">
    <div>
        <h3 class="text-align-center">アカウント情報編集内容確認</h3>
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
                <div>{{ $users->image}}</div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">プロフィール</label>
                <div>{{ $users->profile}}</div>
            </div>
        </div>
        
        <div>
            <a href="{{ route('users.index')}}">
                <button type="button" class="btn btn-sm">編集画面に戻る</button>
            </a> 
            <a href="{{ route('users.index')}}">
                <button type="button" class="btn btn-sm">登録する</button>
            </a> 
        </div>
    </div>
</div>