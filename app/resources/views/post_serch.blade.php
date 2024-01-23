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
            <input class="btn btn-lg col" placeholder="投稿検索ワード入力" name="keyword" value="{{ $keyword}}">
            <!-- <input class="btn btn-lg col" placeholder="スポット検索" name="spotword" value="{{ $spotword}}"> -->
            <select name="evolution" >
              <option value="">評価値</option>
                 @for($i=5; $i>=1; $i--)
                    <option value="{{ $i }}" 
                    @if($evolution == "$i") selected @endif>★ x {{ $i }}</option>
                 @endfor
            </select>
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
<div class="container mt-5">
    <div class="row">
        <div class="col"></div>
        <div class="col">{{ $posts->links() }}</div>
        <div class="col"></div>
    </div>
    
</div>
</body>