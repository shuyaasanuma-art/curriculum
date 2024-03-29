@extends('layouts.layout')
<br><br><br>
<div class="container container-lg">
    <div>
        <h3 class="text-align-center">アカウント情報編集</h3>
        <form action="{{ route('users.check')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class='panel-body'>
            @if($errors->any())
                <div class='alert alert-danger'>
                    @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="container">
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">ユーザー名</label>
                <input type="text" name="name" placeholder="ユーザー名入力" value="{{ old('name')}}">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">メールアドレス</label>
                <input type="text" name="email" placeholder="メールアドレス入力" value="{{ old('email')}}">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">パスワード</label>
                <input type="text" name="password" placeholder="パスワード入力">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">パスワード確認</label>
                <input type="text" name="password_confirmation" placeholder="パスワード確認入力">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">画像</label>
                <input type="file" name="image">
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">プロフィール</label>
                <input type="text" name="profile" placeholder="プロフィール入力" value="{{ old('profile')}}">
            </div>
        </div>
        <div>
            
        </div>
        <button class="submit" >編集内容確認</button>
        </form>
        <div>
            <form action="{{ route('users.show',optional($users)->id ??'')}}">
            @csrf
                <button type="submit" class="btn btn-sm">アカウント削除する</button>
            </form>
        </div>
    </div>
</div>