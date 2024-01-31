@extends('layouts.layout')
<br><br><br>
<div class="container container-m">
    <div>
        <h3 class="text-align-center">アカウントを削除してもよろしいですか。</h3>
        <form action="{{ route('users.destroy',$users)}}" method="post">
        @csrf
        @method('DELETE')
        <div class="container">
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">ユーザー名</label>
                <label for="" class="col-sm-2 col-form-label">{{ $users->name}}</label>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">メールアドレス</label>
                <label for="" class="col-sm-2 col-form-label">{{ $users->email}}</label>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">パスワード</label>
                <label for="" class="col-sm-2 col-form-label">{{ $users->password}}</label>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">パスワード確認</label>
                <label for="" class="col-sm-2 col-form-label">{{ $users->password}}</label>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">画像</label>
                <label for="" class="col-sm-2 col-form-label">{{ $users->image}}</label>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">プロフィール</label>
                <label for="" class="col-sm-2 col-form-label">{{ $users->profile}}</label>
            </div>
        </div>
        <button class="submit" >削除する</button>
        </form>
        <a href="{{ route('users.index')}}">
            <button>編集画面に戻る</button>
        </a>
    </div>
</div>