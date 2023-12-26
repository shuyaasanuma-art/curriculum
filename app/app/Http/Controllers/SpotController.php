<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spot;

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
        $spoting = new Spot;
        $spots = $spoting->get();
        return view('post_spot',[
            'spots'=>$spots,
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
        $spots = new Spot;
        $spots->name = $request->name;
        $spots->address = $request->address;
        $spots->url = $request->url;
        $spots->save();
        return view('post_episode',[
            'spots'=>$spots,
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
        $spots = Spot::find($id);
        return view('post_edit',[
            'spots'=>$spots,
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
        $instance = new Spot;
        $spots = $instance->find($id);
        $columns = ['name','address','longitude','atitude'];
        foreach($columns as $column){
            $spots->$column=$request->$column;
        }
        $spots->save();
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
