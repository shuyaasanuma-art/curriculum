<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Spot;
use App\Post;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        // モデルのSpotメソッドでDBのテーブルに干渉できるため、モデルのSpotを呼び出している
        $spots = new Spot;
        $spots->name = $request->name;
        $spots->address = $request->address;
        $spots->url = $request->url;
        $spots->save();
        
        return view('post_episode',[
            'spots'=>$spots,
            'users'=>$users,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spots = Spot::find($id);
        return view('post_detail',[
            'spots'=>$spots,
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
        $spots = Spot::find($id);
        return view('post_edit_spot',[
            'spots'=>$spots,
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
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $spots = Spot::find($id);
        $spot_id = $spots->id;
        $posts = Post::where('spot_id',$spot_id)->first();
        $columns = ['name','address','url'];
        foreach($columns as $column){
            $spots->$column = $request->$column;
        }
        $spots -> save();
        
        return view('post_edit',[
            'spots'=>$spots,
            'users'=>$users,
            'posts'=>$posts,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spots = Spot::find($id);
        $spots -> delete();
        return redirect('my_post');
    }
}
