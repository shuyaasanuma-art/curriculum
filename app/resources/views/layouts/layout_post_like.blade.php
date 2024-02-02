


<div class="">
    <div class="my-5">
        <div class="">
            <div class="row">
                <!-- 投稿画像 -->
                <a class="col" href="{{ route('posts.show',optional($post)->post_id  ??'')}}">
                    <img src="{{ Storage::url(optional($post)->image)}}" class="rounded-circle"  width="150" height="150">
                </a>
                <div class="col">  
                    <div>
                        <!-- タイトル -->
                        <a href="{{route('posts.show',optional($post)->post_id ??'')}}"　method="get">
   
                           <button class="btn btn-link">{{ optional($post)->title }}</button>
                        </a>
                        <!-- ユーザー名 -->
                        <a href="{{route('posts.show',optional($post)->post_id ??'')}}"　method="get">
                            <button class="btn btn-link">{{ optional($post)->name }}</button>
                        </a>
                        <div>{{ optional($post)->date }}</div>
                    </div>
                     <!-- コメント -->
                    <a href="{{route('posts.show',optional($post)->post_id ??'')}}"　method="get">
                        <button class="btn btn-link">{{ Str::limit(optional($post)->episode,38) }}</button>
                    </a>             

                </div>
            </div>

        </div>
    </div>
</div>

