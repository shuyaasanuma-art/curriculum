<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.layout');
// });
Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    Route::resources([
    'users'=>'UserController',
    'posts'=>'PostController',
    'spots'=>'SpotController',
    'likes'=>'LikeController',
    'follows'=>'FollowController',
    ]);
});
