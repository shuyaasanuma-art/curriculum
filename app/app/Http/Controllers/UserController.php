<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Follow;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        $posts = Auth::user()->post()->withCount('likes')->orderby('created_at','DESC')->paginate(6);
        return view('mypage',[
            'users'=>$users,
            'posts'=>$posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();
        $users = Auth::user()->find($user_id);
        return view('user_edit',[
            'users'=>$users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $users = new User;
        // $users->name = $request->name;
        // $users->email = $request->email;
        // $users->password = $request->password;
        // $users->profile = $request->profile;

        // $users->image = $request->image;
        // $users->save();
        // return view('user_edit_conf',[
        //     'users'=>$users,
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $users = User::find($id);
        // var_dump($users);
        return view('user_delete_conf',[
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
        //
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
        $users = Auth::user()->find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->profile = $request->profile;
        $users->image = $request->image;
        // var_dump($users->image);
        $users->save();
        $posts = Auth::user()->post()->orderby('created_at','DESC')->paginate(6);
        return view('mypage',[
            'posts'=>$posts,
            'users'=>$users,
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
        $users = User::find($id);
        $users -> delete();
        return redirect('/');
    }
}
