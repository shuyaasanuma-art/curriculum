@extends('layouts.layout')

<body>
<div>
   <br>
   <br>
   <br>
   <br>
    <div class="container">
      <form action="{{ route('posts.serch')}}" method="get">
        <div class="row justify-content-around">
            <input class="btn btn-lg col" value="投稿検索ワード入力">
            <div class="col"></div>
            <button type="submit" class="btn btn-primary btn-lg col">探す</button>
        </div>
      </form>
    </div>
</div>
<div class="container">
    <div class="row row-cols-3">
        @foreach($posts as $post)
            @include('layouts.layout_post')
        @endforeach
    </div>
</div>
<div class="container">
 <nav aria-label="Page navigation example">
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