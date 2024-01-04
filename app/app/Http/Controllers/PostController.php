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
    public function index()
    {
        $posting = new Post;
        $posts = $posting->orderby('created_at','DESC')->paginate(6);
        // $posts = $posting->first();
        return view('main',[
            'posts'=>$posts,
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
        
        // var_dump($path);
        $posts->image = $path;
        
        $posts->save();
        
        $spots = new Spot;
        $spots->name = $request->name;
        $spots->address = $request->address;
        $spots->url = $request->url;
        
        return view('post_conf',[
            'spots'=>$spots,
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
        // ユーザーIDが投稿と一致した時、自身の投稿詳細ページへ
        // if ($posts->id == user_id) {
        //     # code...
        //     return view('my_post',[
        //         'posts'=>$posts,
        //     ]);
        // }
        return view('post_detail',[
            'posts'=>$posts,
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
