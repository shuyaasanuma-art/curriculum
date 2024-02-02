<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Spot;
use App\Http\Requests\CreateData;
use App\Http\Requests\CreateUser;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        
        return view('ownerpage',[
            'users'=>$users,
        ]);
        
    }

    public function OwnerUser(Request $request){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $serch = User::query();
        if(!empty($keyword)){
            $serch -> where('name','LIKE', "%{$keyword}%")
                   -> orwhere('id','=','%{$keyword}%');
        }
        if(!empty($sort)){
            if($sort === '0'){
                $serch ->orderBy('created_at')->get();
            }
            else{
                $serch ->orderBy('created_at','DESC')->get();
            }
        }
        $allusers = User::all();
        $allusers = $serch ->withCount('post')->paginate(6);
        return view('user_list',[
            'users'=>$users,
            'allusers'=>$allusers,
            'keyword'=>$keyword,
            'sort'=>$sort,
        ]);
    }

    public function OwnerUserDetail(User $user){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::where('user_id',$user->id)->withCount('likes')->orderby('created_at','DESC')->paginate(6);
        return view('user_page',[
            'users'=>$users,
            'user_detail'=>$user,
            'posts'=>$posts,
        ]);
    }

    public function OwnerUserDel(Request $request,User $user){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $user -> del_flg = 1;
        $user ->save();
        $user = User::withCount('post')->paginate(6);
        return view('user_list',[
            'users'=>$users,
            'allusers'=>$user,
            'keyword'=>$keyword,
            'sort'=>$sort,
        ]);
    }

    public function OwnerUserForm(User $user){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        return view('owner_edit_user',[
            'users'=>$users,
            'user'=>$user,
        ]);
    }


    public function OwnerUserEdit(CreateUser $request,$id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $user = User::find($id);
        $columns = ['name','email','profile','password'];
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $user->image = $request->file('image')->storeAs('public/' . $dir, $img);
        $user->save();
        return redirect()->route('owners.index');
    }


    // 投稿
    public function OwnerPost(Request $request){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $serch = Post::query();
        if(!empty($keyword)){
            $serch -> where('title','LIKE', "%{$keyword}%")
                   -> orwhere('id','=','%{$keyword}%');
        }
        if(!empty($sort)){
            if($sort === '0'){
                $serch ->orderBy('created_at')->get();
            }
            else{
                $serch ->orderBy('created_at','DESC')->get();
            }
        }
        $posts = Post::all();
        $posts = $serch->withCount('likes')->paginate(6);
        return view('post_list',[
            'users'=>$users,
            'posts'=>$posts,
            'keyword'=>$keyword,
            'sort'=>$sort,
        ]);
    }
    public function OwnerPostDetail(Post $post){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);

        return view('post_page',[
            'users'=>$users,
            'posts'=>$post,
        ]);
    }
    public function OwnerPostDel(Request $request,Post $post){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $post -> del_flg = 1;
        $post -> save();
        $post = Post::withCount('likes')->paginate(6);
        return view('post_list',[
            'users'=>$users,
            'posts'=>$post,
            'keyword'=>$keyword,
            'sort'=>$sort,
        ]);
    }
    public function OwnerPostForm(Post $post){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        return view('owner_edit_post',[
            'users'=>$users,
            'posts'=>$post,
        ]);
    }
    public function OwnerPostEdit(CreateData $request,Post $post){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $columns = ['title','date','evolution','episode'];
        foreach($columns as $column){
            $post->$column = $request->$column;
        }
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $post->image = $request->file('image')->storeAs('public/' . $dir, $img);
        $post ->save();
        return redirect()->route('owners.index');
    }
}
