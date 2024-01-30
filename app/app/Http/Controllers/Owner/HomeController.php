<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Spot;
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
        $allusers = $serch ->withCount('post')->paginate(10);
        return view('user_list',[
            'users'=>$users,
            'allusers'=>$allusers,
            'keyword'=>$keyword,
            'sort'=>$sort,
        ]);
    }

    public function OwnerUserDetail($id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $user_detail = User::find($id);
        $posts = Post::where('user_id',$id)->withCount('likes')->orderby('created_at','DESC')->paginate(6);
        return view('user_page',[
            'users'=>$users,
            'user_detail'=>$user_detail,
            'posts'=>$posts,
        ]);
    }

    public function OwnerUserDel(Request $request,$id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $allusers = User::find($id);
        $allusers -> del_flg = 1;
        $allusers ->save();
        $allusers = User::withCount('post')->paginate(10);
        return view('user_list',[
            'users'=>$users,
            'allusers'=>$allusers,
            'keyword'=>$keyword,
            'sort'=>$sort,
        ]);
    }

    public function OwnerUserForm($id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $user_edit = User::find($id);
        return view('owner_edit_user',[
            'users'=>$users,
            'edit'=>$user_edit,
        ]);
    }

    public function OwnerUserEdit(Request $request,$id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $user_edit = User::find($id);
        $columns = ['name','email','profile','password'];
        foreach($columns as $column){
            $user_edit->$column = $request->$column;
        }
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $user_edit->image = $request->file('image')->storeAs('public/' . $dir, $img);
        $user_edit ->save();
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
        $posts = $serch->withCount('likes')->paginate(10);
        return view('post_list',[
            'users'=>$users,
            'posts'=>$posts,
            'keyword'=>$keyword,
            'sort'=>$sort,
        ]);
    }
    public function OwnerPostDetail($id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::withCount('likes')->find($id);
        return view('post_page',[
            'users'=>$users,
            'posts'=>$posts,
        ]);
    }
    public function OwnerPostDel(Request $request,$id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $posts = Post::find($id);
        $posts -> del_flg = 1;
        $posts -> save();
        $posts = Post::withCount('likes')->paginate(10);
        return view('post_list',[
            'users'=>$users,
            'posts'=>$posts,
            'keyword'=>$keyword,
            'sort'=>$sort,
        ]);
    }
    public function OwnerPostForm($id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::find($id);
        return view('owner_edit_post',[
            'users'=>$users,
            'posts'=>$posts,
        ]);
    }
    public function OwnerPostEdit(Request $request,$id){
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Post::find($id);
        $columns = ['title','date','evolution','episode'];
        foreach($columns as $column){
            $posts->$column = $request->$column;
        }
        $dir = 'img';
        $img = $request->file('image')->getClientOriginalName();
        $posts->image = $request->file('image')->storeAs('public/' . $dir, $img);
        $posts ->save();
        return redirect()->route('owners.index');
    }
}
