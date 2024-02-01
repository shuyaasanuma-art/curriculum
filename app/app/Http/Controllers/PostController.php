<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Spot;
use App\User;
use App\Like;

use App\Http\Requests\CreateData;

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
        // ユーザーIDを定義してそのユーザーIDを引っ張れば
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        // withCount('likes')でいいね数を送る
        $posts = Post::withCount('likes')->orderby('created_at','DESC')->paginate(6);

        return view('main',[
            'posts'=>$posts,
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
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = new Post;
        $columns = ['title','image','date','evolution','episode','spot_id'];
        foreach($columns as $column){
            $posts->$column = $request->$column;
        }
        Auth::user()->post()->save($posts);
    
        $posts = Post::withCount('likes')->orderby('created_at','DESC')->paginate(6);

        
        return view('mypage',[
            'posts'=>$posts,
            'users'=>$users,
        ]);
        // return redirect()->route('users.index');
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
        $posts = Post::withCount('likes')->find($id);
        if (is_null($posts)) {
            abort(404);
        }
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
        $posts = Post::where('id',$id)->first();
        if (is_null($posts)) {
            abort(404);
        }
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
    public function update(Request $request,Post $post)
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $columns = ['title','date','episode','evolution','image'];
        foreach($columns as $column){
            $post->$column = $request->$column;
        }
        $post->save();
        return view('post_detail',[
            'users'=>$users,
            'posts'=>$post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post -> delete();
        return redirect('/');
    }
}
