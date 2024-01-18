<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Spot;
use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // ユーザーIDを定義してそのユーザーIDを引っ張ればいいんじゃぜ
        $user_id = Auth::id();
        // var_dump($user_id);
        $users = Auth::user()->find($user_id);
        // var_dump($users);
        $posting = new Post;
        // $posts = $posting->orderby('created_at','DESC')->paginate(6);
        $posts = Post::withCount('likes')->orderby('created_at','DESC')->paginate(6);



        $sort = $request->sort;
        return view('main',[
            'posts'=>$posts,
            'sort'=>$sort,
            'users'=>$users,
        ]);
    }

    //  public function ajaxlike(Request $request)
    // {
    //     $id = Auth::user()->id;
    //     $post_id = $request->post_id;
    //     $like = new Like;
    //     $post = Post::findOrFail($post_id);

    //     // 空でない（既にいいねしている）なら
    //     if ($like->like_exist($id, $post_id)) {
    //         //likesテーブルのレコードを削除
    //         $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
    //     } else {
    //         //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
    //         $like = new Like;
    //         $like->post_id = $request->post_id;
    //         $like->user_id = Auth::user()->id;
    //         $like->save();
    //     }

    //     //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
    //     $postLikesCount = $post->withCount('likes')->likes_count;

    //     //一つの変数にajaxに渡す値をまとめる
    //     //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
    //     $json = [
    //         'postLikesCount' => $postLikesCount,
    //     ];
    //     //下記の記述でajaxに引数の値を返す
    //     return response()->json($json);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = new Post;
        $posts->title = $request->title;
        $posts->date = $request->date;
        $posts->episode = $request->episode;
        $posts->evolution = $request->evolution;

        //送信されたファイルの取得
        $img = $request->file('image');
        //storage > public > img配下に画像が保存される   
        $path = $img->store('img','public');
        $posts->image = $path;
        $posts->spot_id = $request->id;
        Auth::user()->post()->save($posts);
        
        
        return view('post_conf',[
            'posts'=>$posts,
            'users'=>$users,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 自分以外の投稿詳細ページへ
    public function show($id)
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::find($id);
        return view('post_detail',[
            'posts'=>$posts,
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::where('user_id',$user_id)->first();
        // var_dump($posts);
        return view('post_edit',[
            'posts'=>$posts,
            'users'=>$users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::where('user_id',$user_id)->first();
        $posts->title = $request->title;
        $posts->date = $request->date;
        $posts->episode = $request->episode;
        $posts->evolution = $request->evolution;
        $posts->image = $request->image;
        // var_dump($posts->image);
        // $dir = 'img';
        // $img = $request->file('image')->getClientOriginalName();
        // $posts->image = $request->file('image')->storeAs('public/' . $dir, $img);
        Auth::user()->post()->save($posts);
        
        return view('post_detail',[
            'users'=>$users,
            'posts'=>$posts,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts -> delete();
        return redirect('/');
    }
}
