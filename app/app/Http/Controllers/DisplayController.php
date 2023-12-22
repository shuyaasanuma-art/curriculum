<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

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
        return view('post_spot');
    }
}
