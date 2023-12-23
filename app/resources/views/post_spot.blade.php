@extends('layouts.layout')
<br>
<br>
<br>
<div>
    <div class="container container-m">
        <div>
            <h1 class="text justify-content-center">新規スポット登録</h1>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <input class="col-3" type="text">
            <button class="col-2">探す</button>
            <div class="col-3"></div>
       </div>
    </div>
    <div class="container">
        
        <iframe width="800" height="600" src="//www.google.com/maps/embed/v1/search?key=AIzaSyDLuIsMeevGk54UbK14LYapRfREb4jYppE&center=35.7943492,139.7925433&zoom=16&q=%E3%83%A9%E3%83%BC%E3%83%A1%E3%83%B3"></iframe>
    </div>

    
    <div class="container">
        <div class="row">
            <a href="{{ route('posts.index')}}" class="col ">
                <button class="btn btn-lg">マイページに戻る</button>
            </a>
            <div class="col"></div>
            <a href="{{ route('spots.create')}}" class="col">
                <button class="btn btn-lg">登録する</button>
            </a>   
        </div>
    </div>
</div>