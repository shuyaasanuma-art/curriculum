@extends('layouts.layout')
<br><br><br>
<div>
    <div>
    <form action="{{ route('posts.check',$posts)}}" method="post" enctype="multipart/form-data">
    @csrf
        <div  class="container container-lg border">
          <div class="row">
            <div class="col m-5">
                <div>
                    <h4 class="font-weight-bolder">スポット情報</h4>
                </div>
                <div class="row">
                    <h5>名称：</h5>
                    <h5>{{$posts->spot->name}}</h5>
                </div>
                <div class="row">
                    <h5>所在地:</h5>
                    <h5>{{$posts->spot->address}}</h5>
                </div>   
                <div class="row">
                    <h5>URL：</h5>
                    <h5><a href="{{ $posts->spot->url}}">クリックで登録したスポットに飛びます</a></h5>
                </div>
            </div>
            <div class="col m-5">
                <a href="{{ route('spots.edit',$posts->spot_id)}}">
                    スポットを変更する
                </a>
            </div>
          </div>
        
        </div> 

        <div class="container container-lg border">
            <div class="row m-5">
                   <div class="col-6 m-2">
                        <!-- アイコン画像 -->
                
                        <h4 class="font-weight-bolder">エピソード編集</h4>
                        <div class="panel-body">
                            @if($errors->any())
                                <div class='alert alert-danger'>
                                    <ul>
                                    @foreach($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="container m-2">
                            <input type="text" name="title" placeholder="{{ $posts->title}}">
                        </div>
                        <div class="container m-2">
                            <input type="date" name="date">
                        </div>
                        <div class="container row m-2">
                            <h5 class="col">評価</h5>
                            <input class="col" type="number" name="evolution" min="1" max="5" placeholder="{{ $posts->evolution}}">
                            <div class="col-7"></div>
                        </div>
                        <div class="container m-2">
                            <textarea type="text" name="episode" placeholder="{{ $posts->episode}}"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <input type="file" name="image">
                        <div>以前投稿した写真⇩</div>
                        <img src="{{ Storage::url($posts->image)}}" width="300"　height="300">
                    </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <button type="submit">編集内容確認</button>
        </div>
    </div>
    </form>
    <div class="container">
        <div class="row">
            <div class="col m-2">
                <form action="{{ route('posts.checkdestroy',$posts)}}" method="post">
                @csrf
                    <div hidden>
                        <input type="text" name="id" value="{{$posts->id}}">
                        <input type="text" name="title" value="{{$posts->title}}">
                        <input type="text" name="episode" value="{{$posts->episode}}">
                        <input type="text" name="evolution" value="{{$posts->evolution}}">
                        <input type="text" name="image" value="{{$posts->image}}">
                    </div>
                    
                    
                    <button>削除する</button>
                </form>
            </div>
        </div>
    </div>
  
</div>