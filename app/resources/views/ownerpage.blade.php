@extends('layouts.layout')
<br><br><br><br>
<div class="col-md-5 mx-auto">
  <div class="container container-m">
    <div class="">
        <h1 class="text-center">管理者ページ</h1>
        <div class="row">
            <a class="col" href="{{route('owners.user')}}">
               <button class="">ユーザー検索</button>
            </a>
            <a class="col"></a>
            <a class="col" href="{{route('owners.post')}}">
               <button>投稿検索</button>
            </a>
        </div>
        
  
    </div>
  </div>
</div>