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
            <h1 class="text justify-content-center">スポット編集</h1>
        </div>
        <div class="row">
            <form action="{{ route('spots.update',$spots->id)}}" method="post">
                @csrf
                @method('PUT')
                <input class="col-4" type="text" name="name" placeholder="{{$spots->name}}">
                <input class="col-4" type="text" name="address" placeholder="{{$spots->address}}">
                <input class="col-10" type="text" name="url" placeholder="{{$spots->url}}">
                <input type="submit" name="button" value="再登録">
            </form>
       </div>
    </div>
    <div class="container">
        <iframe src="{{$spots->url}}" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    
    <div class="container">
        <div class="row">
            <a href="{{route('posts.edit',$spots->id)}}" class="col ">
                <button class="btn btn-lg">編集画面に戻る</button>
            </a>
          
        </div>
    </div>
</div>