@extends('layouts.layout')

<body>
<div>
   <br>
   <br>
   <br>
   <br>
    <div class="container">
        <div class="row justify-content-between">
            <button type="button" class="btn btn-primary btn-lg col">タイムライン</button>
            <div class="col"></div>
            <a href="{{ route('posts.serch')}}">
                <button type="button" class="btn btn-primary btn-lg col">投稿検索</button>
            </a>
            
        </div>

    </div>
</div>
<div class="container">
    <div class="row justify-content-between">
        @foreach($posts as $post)
            @include('layouts.layout_post')
        @endforeach
    </div>
</div>

<br>
<div class="container">
 <nav aria-label="Page navigation example" >
  <ul class="pagination row justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#!" aria-label="Previous">
        <span aria-hidden="true">«</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#!">1</a></li>
    <li class="page-item"><a class="page-link" href="#!">2</a></li>
    <li class="page-item"><a class="page-link" href="#!">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#!" aria-label="Next">
        <span aria-hidden="true">»</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
 </nav>
</div>
</body>
