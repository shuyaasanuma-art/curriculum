@extends('layouts.layout')
<br><br><br>
<div class="container container-m">
    <div>
        <h3 class="text-align-center">管理者によるアカウント情報編集</h3>
        <form action="{{ route('owners.edit',$edit->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="container">
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">ユーザー名</label>
                <input type="text" name="name" placeholder="{{$user->name}}">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">メールアドレス</label>
                <input type="text" name="email" placeholder="{{$user->email}}">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">パスワード</label>
                <input type="text" name="password" placeholder="{{$user->password}}">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">パスワード確認</label>
                <input type="text" name="password_confimation" placeholder="{{$user->password}}">
            </div>
            
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">画像</label>
                <input type="file" name="image">
            </div>
            <div cllass="row mb-3">
                <label for="" class="col-sm-2 col-form-label">現在のプロフィール画像</label>
                <img src="{{Storage::url(optional($user)->image)}}" width="200" height="200" alt="">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">プロフィール</label>
                <input type="text" name="profile" placeholder="{{$user->profile}}">
            </div>
        </div>
        <div>
            
        </div>
        <button class="submit" >編集完了</button>
        </form>
    </div>
</div>