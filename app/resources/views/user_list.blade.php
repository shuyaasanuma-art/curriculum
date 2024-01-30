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
                    <form action="{{route('owners.user')}}" method="get">
                        <input type="text"　class="" placeholder="検索ワード入力" name="keyword" value="{{ $keyword}}">
                        <button type="submit" class="btn btn-primary ">探す</button>
                    </form>
                </div>
                <div class="col"></div>
                <div class="col row">
                    <form action="{{route('owners.user')}}" method="get">
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
                    <th scope="col">ユーザーID</th>
                    <th scope="col">ユーザー名</th>
                    <th scope="col">ステータス</th>
                    <th scope="col">投稿数</th>
                    <th scope="col">詳細</th>
                    <th scope="col">編集</th>
                </tr>
                @foreach($allusers as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->del_flg}}</td>
                    <td>{{$user->post_count}}</td>
                    <td><a href="{{route('users.detail',$user->id)}}">
                        リンク
                    </a></td>
                    <td class="">
                        <form action="{{ route('owners.del',$user->id)}}" method="post">
                        @csrf
                            <input hidden type="text" name="keyword" value="{{$keyword}}">
                            <input hidden type="text" name="sort" value="{{$sort}}">
                            <button type="submit">削除</button>
                        </form>
                        /
                        <a href="{{ route('owners.edit',$user->id)}}">編集</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div>{{ $allusers->links()}}</div>
    </div>
</div>
