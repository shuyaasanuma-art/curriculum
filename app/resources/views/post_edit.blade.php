@extends('layouts.layout')
<br><br><br>
<div>
    <div>
    <form action="{{ route('posts.edit',$posts->id)}}" method="get">
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
                <div>
                    <h5>URL：</h5>
                    <div>{{ $posts->spot->url}}</div>
                </div>
            </div>
            <div class="col m-5">
                <a href="{{ route('spots.edit',$posts->spot_id)}}">
                    <button class="">スポットを変更する</button>
                </a>
            </div>
          </div>
        
        </div> 

        <div class="container container-lg border">
            <div class="row m-5">
                   <div class="col-6">
                        <!-- アイコン画像 -->
                
                        <h4 class="font-weight-bolder">{{ $posts->title}}</h4>
              
                        <h5>{{ $posts->date}}</h5>
                        <div class="row">
                            <h5 class="col">評価</h5>
                            <h5 class="col-10">{{ $posts->evolution}}</h5>
                        </div>
                        <h5>{{ $posts->episode}}</h5>
                    </div>
                    <div class="col">
                        <img src="{{ Storage::url($posts->image)}}" width="400"　height="400">
                    </div>
            </div>
        </div>
    </div>
    </form>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href=""></a>
            </div>
        </div>
    </div>
  
</div>