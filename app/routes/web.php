<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\DisplayController;
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
// Route::get('/',function(){
//  return view('welcome');
// });
Auth::routes();

Route::group(['middleware'=>'auth'],function(){
   Route::get('/',[PostController::class,'index']);
   //投稿検索
   Route::get('/post/serch',[DisplayController::class,'index'])->name('posts.serch');
   Route::get('/post/spot',[DisplayController::class,'PostSpot'])->name('posts.spot');
   Route::post('/post/check',[DisplayController::class,'PostCheck'])->name('posts.check');
   Route::post('/user/check',[DisplayController::class,'UserCheck'])->name('users.check');
   Route::post('/post/check/destroy',[DisplayController::class,'PostCheckDestroy'])->name('posts.checkdestroy');

   Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
   ]);
   Route::resource('spots','SpotController')->only([
    'store','destroy','edit','show','update'
   ]);
//    Route::post('/like/{postId}',[LikeController::class,'store']);
//    Route::post('/unlike/{postId}',[LikeController::class,'destroy']);
   //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
//    Route::post('ajaxlike', 'PostController@ajaxlike')->name('posts.ajaxlike');
Route::post('/like', 'DisplayController@like')->name('posts.like');

});


