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
        $posts = $posting->orderby('created_at','DESC')->paginate(6);
        $sort = $request->sort;
        return view('main',[
            'posts'=>$posts,
            'sort'=>$sort,
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $posts = Post::where('del_flg',0)->get();
        // Storage::put('logo.jpg');
        // return view('post_episode',[
        //     'posts'=>$posts,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        
        $posts = Post::find($id);
        // $spots = Spot::find($id);
        $users = User::find($id);
        // var_dump($spots);
        // ユーザーIDが投稿と一致した時、自身の投稿詳細ページへ
        // if ($posts->user_id == $user->id) {
        //     $users = Auth::user()->find($id);
        //     return view('my_post',[
        //         'posts'=>$posts,
        //         'users'=>$users,
        //         'spots'=>$spots,
        //     ]);
        // }
        return view('post_detail',[
            'posts'=>$posts,
            'users'=>$users,
            'spots'=>$spots,
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
        $posts = Post::find($id);
        return view('post_edit',[
            'posts'=>$posts,
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
        $instance = new Post;
        $posts = $instance->find($id);
        $columns = ['title','date','image','episode','evolution'];
        foreach($columns as $column){
            $posts->$column=$request->$column;
        }
        $posts->save();
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
        return redirect('my_post');
    }
}
