@extends('layouts.layout')
<br><br><br>

<div>
    <div class="container container-m">
        <div>
            <h3>スポット情報</h3>
        </div>
        <div class="row">
            <div class="">名称:</div>
            <div>{{ $spots->name}}</div>
        </div>
        <div class="row">
            <div>所在地:</div>
            <div>{{ $spots->address }}</div>
        </div>
        <div></div>
        <a href="{{ $spots->url}}">スポットのURL</a>
    </div>
    <form action="{{ route('posts.checkstore')}}"  method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="container container-m">
        <div　class="container">
            <h1>エピソード登録</h1>
        </div>
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
        <div hidden>
            <input type="text" name="id" id="" value="{{ $spots->id}}">
        </div>
        <div class="row justify-content-center">
                <div class="container">
                    <div>タイトル</div>
                    <input type="text" name="title" value="{{ old('title')}}" >
                </div>
                <div class="container">
                    <div>日付</div>
                    <input type="date" name="date" value="{{ old('date')}}" >
                </div>
                <div class="container">
                    <div>５段階評価登録</div>
                    <input type="number" min="1" max="5" name="evolution" value="{{ old('evolution')}}" >
                </div>
                <div class="container">
                    <div>画像</div>
                    <input type="file" name="image" >
                </div>
                <div class="container">
                    <div>コメント</div>
                    <textarea type="text" name="episode"></textarea>
                </div>                
                <div hidden></div>
            <div class="container">
                <button type="submit" name="button" class="btn btn-lg" >投稿内容確認</button>
            </div>
        </div>
    </div>
    </form>
    <div class="container">
            <a href="{{ route('posts.spot')}}" class="col ">
                <button class="btn btn-lg">スポット登録に戻る</button>
            </a>
    </div>

</div>