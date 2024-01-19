


<div class="">
    <div class="my-5">
        <div class="">
            <div class="row">
                <!-- 投稿画像 -->
                <a class="col" href="{{ route('posts.show',optional($post)->id  ??'')}}">
                    <img src="{{ Storage::url(optional($post)->image)}}" class="rounded-circle"  width="150" height="150">
                </a>
                <div class="col">  
                    <div>
                        <!-- タイトル -->
                        <a href="{{route('posts.show',optional($post)->id ??'')}}"　method="get">
   
                           <button class="btn btn-link">{{ optional($post)->title }}</button>
                        </a>
                        <!-- ユーザー名 -->
                        <a href="{{route('posts.show',optional($post)->id ??'')}}"　method="get">
                            <button class="btn btn-link">{{ optional($post)->name }}</button>
                        </a>
                        <div>{{ optional($post)->date }}</div>
                    </div>
                     <!-- コメント -->
                    <a href="{{route('posts.show',optional($post)->id ??'')}}"　method="get">
                        <button class="btn btn-link">{{ optional($post)->episode }}</button>
                    </a>             
                    
                    @auth
                        <!--Post.phpに作ったisLikedByメソッドをここで使用 -->
                        @if (!$post->isLikedBy(Auth::user()))
                            <span class="likes">
                                <i class="like-toggle" data-post-id="{{ $post->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                                </i>
                                <span class="like-counter">{{$post->likes_count}}</span>
                                
                            </span><!-- /.likes -->
                        @else
                            <span class="likes">
                                <i class="like-toggle liked" data-post-id="{{ $post->id }}">              
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill=”#00b7ce” d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                                </i>
                                <span class="like-counter">{{$post->likes_count}}</span>
                            </span><!-- /.likes -->
                        @endif
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>



