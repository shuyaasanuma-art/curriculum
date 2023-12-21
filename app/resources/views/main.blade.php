@extend('layouts.layout')

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
            <button type="button" class="btn btn-primary btn-lg col">投稿検索</button>
        </div>

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-4">@include('layouts.layout_post')</div>
        <div class="col-4">@include('layouts.layout_post')</div>
        <div class="col-4">@include('layouts.layout_post')</div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-4">@include('layouts.layout_post')</div>
        <div class="col-4">@include('layouts.layout_post')</div>
        <div class="col-4">@include('layouts.layout_post')</div>
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
