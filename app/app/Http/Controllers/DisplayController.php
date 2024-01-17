<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;
use App\Spot;

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
}
