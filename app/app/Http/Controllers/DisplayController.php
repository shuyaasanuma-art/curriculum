<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;
use App\Spot;
use App\Like;

class DisplayController extends Controller
{
    public function index(){
        $posting = new Post;
        // $posts = $posting->orderby('created_at','DESC')->paginate(6);
        $posts = $posting->first();
        return view('post_serch',[
            'posts'=>$posts,
        ]);
    }
    public function PostSpot(){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        // var_dump($users);
        return view('post_spot',[
            'users'=>$users,
        ]);
    }
    public function PostCheck(Request $request){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::where('user_id',$user_id)->first();
        
        
        $columns = ['title','date','image','episode','evolution'];
        foreach($columns as $column){
            $posts->$column=$request->$column;
        }
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $posts->image = $request->file('image')->storeAs('public/' . $dir, $img);
        
        return view('post_edit_conf',[
            'users'=>$users,
            'posts'=>$posts,
        ]);

    }
    //次がupdate
    public function UserCheck(Request $request){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $columns = ['name','email','password','image','profile'];
        foreach($columns as $column){
            $users->$column = $request->$column;
        }
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $users->image = $request->file('image')->storeAs('public/' . $dir, $img);
        return view('user_edit_conf',[
            'users'=>$users,
        ]);
    }
    public function PostCheckDestroy(){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::where('user_id',$user_id)->first();
        return view('post_delete_conf',[
            'users'=>$users,
            'posts'=>$posts,
        ]);
    }
    public function like(Request $request){
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $post_id = $request->post_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->post_id = $post_id; //Likeインスタンスにpost_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
}

}
