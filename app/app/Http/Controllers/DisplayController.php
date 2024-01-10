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
}
