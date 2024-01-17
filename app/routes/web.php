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

   Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
   ]);
   Route::resource('spots','SpotController')->only([
    'store','destroy','edit','show','update'
   ]);
});


