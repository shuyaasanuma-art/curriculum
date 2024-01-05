

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
                     
                     
                </div>
            </div>
        </div>
    </div>
</div>


