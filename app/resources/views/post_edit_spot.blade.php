@extends('layouts.layout')
<br><br><br><br>
<div class="container container-m">
    <div>
        <h3>アカウント情報編集</h3>
        <div>
            
        </div>
    </div>
</div>
<div>
    <div class="container container-m">
        <div>
            <h1 class="text justify-content-center">新規スポット登録</h1>
        </div>
        <div class="row">
            <form action="{{ route('spots.store')}}" method="post">
                @csrf
                <input class="col-4" type="text" name="name" placeholder="スキー場の名称">
                <input class="col-4" type="text" name="address" placeholder="住所">
                <input class="col-10" type="text" name="url" placeholder="こちらにGoogleMapのurlをペーストしてください">
                <input type="submit" name="button" value="次に進む">
            </form>
       </div>
    </div>
    <div class="container">
        <iframe src="{{$spots->url}}" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    
    <div class="container">
        <div class="row">
            <a href="{{ route('users.index')}}" class="col ">
                <button class="btn btn-lg">マイページに戻る</button>
            </a>
          
        </div>
    </div>
</div>