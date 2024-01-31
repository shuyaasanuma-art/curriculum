@extends('layouts.layout')
<br><br><br>
<div class="container">
    <div>
        <div>
            <div class="">
                <h4>管理ユーザー専用画面</h4>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{route('owners.post')}}" method="get">
                        <input type="text"　class="" placeholder="検索ワード入力" name="keyword"　value="{{ $keyword}}">
                        <button type="submit" class="btn btn-primary btn-lg">探す</button>
                    </form>
                </div>
                <div class="col"></div>
                <div class="col row">
                    <form action="{{route('owners.post')}}" method="get">
                        <button type="submit">ソート</button>
                        <select name="sort">
                            <option value="" value="{{$sort}}">選択後ソートボタンをクリック</option>
                            <option value="1">新しい順</option>
                            <option value="0">古い順</option>
                        </select>
                    </form>
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th scope="col">投稿ID</th>
                    <th scope="col">ユーザー名</th>
                    <th scope="col">投稿名</th>
                    <th scope="col">いいね数</th>
                    <th scope="col">ステータス</th>
                    <th scope="col">詳細</th>
                    <th scope="col">編集</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->likes_count}}</td>
                    <td>{{$post->del_flg}}</td>
                    <td><a href="{{route('owners.postdetail',$post)}}">
                        リンク
                    </a></td>
                    <td>
                        <form action="{{ route('owners.postdel',$post)}}" method="post">
                        @csrf
                            <input hidden type="text" name="keyword" value="{{$keyword}}">
                            <input hidden type="text" name="sort" value="{{$sort}}">
                            <button type="submit">削除</button>
                        </form>
                        <a href="{{ route('owners.postedit',$post)}}">編集</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div>{{ $posts->links()}}</div>
    </div>
</div>