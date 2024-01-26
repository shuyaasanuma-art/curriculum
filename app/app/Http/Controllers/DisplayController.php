<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Post;
use App\User;
use App\Spot;
use App\Like;
use App\Follow;

class DisplayController extends Controller
{
    public function index(Request $request){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $keyword = $request->input('keyword');
        $spotword = $request->input('spotword');
        $evolution = $request->input('evolution');
        $serch = Post::query();
        // $serch = Post::query()->with('spot')->get();
        if (!empty($keyword)) {
            $serch ->where('title', 'LIKE', "%{$keyword}%");
        }
        // if (!empty($spotword)) {
        //     $serch ->where('name','LIKE',"%{$spotword}%");
        // }
        if (!empty($evolution)) {
            $serch ->where('evolution','=',$evolution);
        }
        $posts = $serch->withCount('likes')->orderby('created_at','DESC')->paginate(6) ;
        return view('post_serch',[
            'posts'=>$posts,
            'users'=>$users,
            'keyword'=>$keyword,
            'evolution'=>$evolution,
            'spotword'=>$spotword,
        ]);
    }
    public function PostSpot(){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        return view('post_spot',[
            'users'=>$users,
        ]);
    }
    // 新規投稿前の確認画面
    public function PostCheckStore(Request $request,$id){
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
        return view('post_conf',[
            'posts'=>$posts,
            'users'=>$users,
        ]);
    }

    public function PostCheck(Request $request,$id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::where('user_id',$user_id)->find($id);
        
        
        $columns = ['title','date','episode','evolution'];
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
        $columns = ['name','email','password','profile'];
        foreach($columns as $column){
            $users->$column = $request->$column;
        }
        // publicの下に作るファイル
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $users->image = $request->file('image')->storeAs('public/' . $dir, $img);
        return view('user_edit_conf',[
            'users'=>$users,
        ]);
    }


    // 　　　　　　　　　　　　　　　　　　　　$id呼び出せていない直す
    public function PostCheckDestroy(Request $request,$id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        
        $posts = Post::where('user_id',$user_id)->find($id);
        $columns = ['title','evolution','episode','image','date'];
        foreach($columns as $column){
            $posts->$column = $request->$column;
        }
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



    // 出したいものはログインユーザーがいいねした投稿
    public function likeFoot(){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        //　ログインユーザーのユーザー情報
       
        // いいねしているもの　likesのuser_id=ログインユーザー likesのpost_id=postsのid
        // post_idを定義すれば完成  ユーザーテーブルとlikeテーブル->ログインユーザーのいいねテーブルの情報
        // $like = new Like;
        // $like = Like::where('user_id',$user_id)->get();//  ログインユーザーがいいねした情報(likeテーブル)
        $like = Like::select('post_id')->where('user_id',$user_id)->get();
        // $like = Post::with('likes')->where('id','likes:post_id')->first(); 

        var_dump($like);
        // $like_post_id = $like->first();
        // var_dump($like_post_id);

        //withとかall

        //likeテーブルのpost_idとpostテーブルのidが一致するpostテーブルのレコードを取得
        // $posts = Post::where('user_id',Auth::id())->where('id','likes:post_id')->withCount('likes')->orderby('created_at','DESC')->paginate(6);
    
        // 
        $posts = Post::with('user:id','user.likes:user_id')->where('id','likes:post_id')->withCount('likes')->orderby('created_at','DESC')->paginate(6);
        // var_dump($post);
        // $posts = Post::withCount('likes')->where('id','user.likes:post_id')->orderby('created_at','DESC')->paginate(6); //　ユーザーがいいねしたpostテーブル一覧
        // var_dump($posts);
        return view('footprint_list',[
            'users'=>$users,
            'posts'=>$posts,
        ]);
    }



    public function follow($id){
        $user_id = Auth::user()->id;//ログインユーザーのid取得
        $follow_id = Post::where('id',$id)->get('user_id');//投稿した人のuser_idの取得
        $followCount = count(Follow::where('follow_id','=', $follow_id)->get());
        // varidation用
        // $follow = Follow::create([
        //     'user_id'=>Auth::user()->id,
        //     'follow_id'=>$user->id,
        // ]);
        // $followCount = count(Follow::where('follow_id', $user->id)->get());
        return response()->json(['followCount' => $followCount]);
    }

    public function unfollow($id){
        $follow = Follow::where('user_id', Auth::user()->id)->where('follow_id', $user->id)->first();
        $follow->delete();
        $followCount = count(Follow::where('follow_id', $user->id)->get());

        return response()->json(['followCount' => $followCount]);
    }
}
