<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Post;
use App\User;
use App\Spot;
use App\Like;
// use App\Follow;
use App\Http\Requests\CreateData;
use App\Http\Requests\CreateUser;

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
    public function PostCheckStoreForm(CreateData $request,User $user){
        
        $posts = new Post;
        $columns = ['title','date','episode','evolution'];
        foreach($columns as $column){
            $posts->$column = $request->$column;
        }
        // //送信されたファイルの取得
        // $img = $request->file('image');
        // //storage > public > img配下に画像が保存される   
        // $path = $img->store('img','public');
        // $posts->image = $path;
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $posts->image = $request->file('image')->storeAs('public/' . $dir, $img);
        $posts->spot_id = $request->id;
        return view('post_episode',[
            'posts'=>$posts,
            'users'=>$user,
        ]);
    }
    public function PostCheckStore(CreateData $request,User $user){
        $posts = new Post;
        $columns = ['title','date','episode','evolution'];
        foreach($columns as $column){
            $posts->$column = $request->$column;
        }
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $posts->image = $request->file('image')->storeAs('public/' . $dir, $img);
        $posts->spot_id = $request->id;
        return view('post_conf',[
            'posts'=>$posts,
            'users'=>$user,
        ]);
    }
    


    // 投稿編集確認に画面遷移
    public function PostCheck(Post $post,CreateData $request){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        if ($users->id !== $post->user_id) {
            echo 'testtesttest';
            abort(404);
        }
        $columns = ['title','date','episode','evolution'];
        foreach($columns as $column){
            $post->$column=$request->$column;
        }

        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $post->image = $request->file('image')->storeAs('public/' . $dir, $img);

        return view('post_edit_conf',[
            'users'=>$users,
            'posts'=>$post,
        ]);

    }
    public function PostForm(Post $post){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        return view('post_edit_conf',[
            'users'=>$users,
            'posts'=>$post,
        ]);

    }
    //次がupdate
    public function UserCheck(CreateUser $request){
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

    

    // error
    public function PostCheckDestroy(Request $request,Post $post){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        if (Auth::user()->id !== $post->user_id) {
            abort(404);
        }
        // $posts = Post::where('user_id',$user_id)->find($id);
        $columns = ['title','evolution','episode','image','date'];
        foreach($columns as $column){
            $post->$column = $request->$column;
        }
        return view('post_delete_conf',[
            'users'=>$users,
            'posts'=>$post,
        ]);
    }
    public function PostCheckDestroyForm(Post $post){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        return view('post_delete_conf',[
            'users'=>$users,
            'posts'=>$post,
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
    
        //  ログインユーザーがいいねした情報(likeテーブル)
        // ログインユーザーがいいねしたレコードのみ出る(post_idを取得したい!!)
        // $like = Like::select('post_id')->where('user_id',$user_id)->get();
        
        $posts = DB::table('posts')
             ->join('likes','posts.id','=','likes.post_id')
             ->where('likes.user_id','=',$user_id)
             ->paginate(6);
        // いいね数とview川でいいね数といいね一覧の紐付けをする。なぜかuserを絞ると総イイネ数が合わなくなる
        // $posts = Post::with('likes')
        //     ->where('posts.id','=','likes.post_id')
        //     ->where('likes.user_id','=',$user_id)
        //     ->get();
        // $posts -> orderby('created_at','DESC')->paginate(6);
        // $likes = Post::withCount('likes')->first();
        // orderby('created_at','DESC')->paginate(6);

        // var_dump($likes);
        // var_dump($posts);
        // $like_post_id = $like->post_id;
 

        //withとかall

        //likeテーブルのpost_idとpostテーブルのidが一致するpostテーブルのレコードを取得
        // $posts = Post::where('user_id',Auth::id())->where('id',$id)->withCount('likes')->orderby('created_at','DESC')->paginate(6);
    
        // $posts = Post::with('likes')
        // // ->where('id',$like['post_id'])
        // ->withCount('likes')->orderby('created_at','DESC')->paginate(6);
        
        // $posts = Post::with('user:id','user.likes:user_id')
        // ->where('id','likes:post_id')
        // ->withCount('likes')
        // ->orderby('created_at','DESC')->paginate(6);

        // var_dump($posts);
        // $posts = $post::withCount('likes')->orderby('created_at','DESC')->paginate(6); //　ユーザーがいいねしたpostテーブル一覧
        // var_dump($posts);
        return view('footprint_list',[
            'users'=>$users,
            'posts'=>$posts,
            // 'likes'=>$likes,
        ]);
    }



    // public function follow($userId){
    //     // $user_id = Auth::user()->id;//ログインユーザーのid取得
    //     //投稿した人のuser_idの取得
    //     // $followCount = count(Follow::where('follow_id','=', $user)->get());
    //     Auth::user()->follow()->attach($userId);
    //     // varidation用
    //     $follow = Follow::create([
    //         'user_id'=>Auth::user()->id,
    //         'follow_id'=>$user->id,
    //     ]);
    //     // $followCount = count(Follow::where('follow_id', $user->id)->get());
    //     return response()->json(['followCount' => $followCount]);
    // }

    // public function store($user){
    //     Auth::user()->follows()->attach($user);
    //     return;
    // }

    // public function destroy($user){
    //     Auth::user()->follows()->detach($user);
    //     return;
    // }

//     public function unfollow($id){
//         $follow = Follow::where('user_id', Auth::user()->id)->where('follow_id', $user->id)->first();
//         $follow->delete();
//         $followCount = count(Follow::where('follow_id', $user->id)->get());

//         return response()->json(['followCount' => $followCount]);
//     }
}
