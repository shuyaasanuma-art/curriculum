@extends('layouts.layout')

<body>
<div>
   <br>
   <br>
   <br>
   <br>
    <div class="container">
        <div class="row justify-content-between">
            <button type="button" class="btn btn-primary btn-lg col">いいねした投稿一覧</button>
            <div class="col"></div>
        </div>

    </div>
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



</body>
