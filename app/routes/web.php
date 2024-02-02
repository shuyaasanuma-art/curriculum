<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\Owner\HomeController;
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
// 管理者ユーザー
Route::group(['middleware' => 'owner_auth'], function () {
   Route::get('/owner/home', 'Owner\HomeController@index')->name('owners.index');
   Route::get('/owner/user',[HomeController::class,'OwnerUser'])->name('owners.user');

      Route::get('/owner/user/detail/{user}',[HomeController::class,'OwnerUserDetail'])->name('users.detail');
      Route::post('/owner/user/del/{user}',[HomeController::class,'OwnerUserDel'])->name('owners.del');
      Route::get('/owner/user/edit/{user}',[HomeController::class,'OwnerUserForm'])->name('owners.edit');
      Route::post('/owner/user/edit/{user}',[HomeController::class,'OwnerUserEdit']);

   

      Route::get('/owner/post/detail/{post}',[HomeController::class,'OwnerPostDetail'])->name('owners.postdetail');
      Route::post('/owner/post/del/{post}',[HomeController::class,'OwnerPostDel'])->name('owners.postdel');
      Route::get('/owner/post/edit/{post}',[HomeController::class,'OwnerPostForm'])->name('owners.postedit');
      Route::post('/owner/post/edit/{post}',[HomeController::class,'OwnerPostEdit']);

   Route::get('/owner/post',[HomeController::class,'OwnerPost'])->name('owners.post');
   
});
// Route::get('/admin', 'AdminController@index')->name('admin');
// Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
//     Route::get('/admin', 'AdminController@index')->name('admin');
// });
// 一般ユーザー
Route::group(['middleware'=>'auth'],function(){
   
   Route::get('/',[PostController::class,'index']);
   
   //投稿検索
   Route::get('/post/serch',[DisplayController::class,'index'])->name('posts.serch');

   Route::group(['middleware'=>'can:view,post'],function(){
      Route::get('/post/{post}/check/',[DisplayController::class,'PostForm']);
      Route::post('/post/{post}/check/',[DisplayController::class,'PostCheck'])->name('posts.check');
      Route::get('/post/{post}/check/destroy',[DisplayController::class,'PostCheckDestroyForm']);
      Route::post('/post/{post}/check/destroy',[DisplayController::class,'PostCheckDestroy'])->name('posts.checkdestroy');
   });
   Route::get('/post/spot',[DisplayController::class,'PostSpot'])->name('posts.spot');
   
   Route::get('/post/check/store/',[DisplayController::class,'PostCheckStoreForm']);
   Route::post('/post/check/store/',[DisplayController::class,'PostCheckStore'])->name('posts.checkstore');
   Route::post('/user/check',[DisplayController::class,'UserCheck'])->name('users.check');
   

   Route::get('/spots',[DisplayController::class,'PostCheckForm']);
   Route::resource('spots','SpotController')->only([
    'store','destroy','edit','show','update'
   ]);


   // Route::get('/spots/{spot}',[DisplayController::class,'PostCheckForm']);
   // Route::post('/spots/{spot}',[DisplayController::class,'PostCheckSpotForm'])->name('spots.store');
   // Route::resource('spots','SpotController')->only([
   //  'destroy','edit','show','update'
   // ]);


   

   Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
   ]);
   
   Route::post('/like', 'DisplayController@like')->name('posts.like');
   Route::get('/footprint',[DisplayController::class,'likeFoot'])->name('likefoot');


});


