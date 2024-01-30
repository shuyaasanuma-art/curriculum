@extends('layouts.layout')
<br><br><br>
<div class="container container-m">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <img src="{{ Storage::url(optional($user_detail)->image)}}" class="rounded-circle"  width="150" height="150">
                    <h4>フォロー</h4>
                    <h4>フォロワー</h4>
                </div>
                <div>
                    <div>{{ optional($user_detail)->name ??''}}</div>
                    <div placeholder="プロフィール">{{ optional($user_detail)->profile ??''}}</div>
                </div>
            </div>
            
            
        </div>
        
    </div>
    <div class="container">
    
    </div>
    <div class="container">
    <div class="row row-cols-3">
        @foreach($posts as $post)
            @include('layouts.layout_post')
        @endforeach
    </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col"></div>
            <div class="col">{{ $posts->links() }}</div>
            <div class="col"></div>
        </div>
    </div>
</div>