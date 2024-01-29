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
Route::group(['middleware' => 'owner_auth'], function () {
   Route::get('/owner/home', 'Owner\HomeController@index');
});

Route::group(['middleware'=>'auth'],function(){
   Route::get('/',[PostController::class,'index']);
   
   //投稿検索

   Route::get('/post/serch',[DisplayController::class,'index'])->name('posts.serch');
   Route::get('/post/spot',[DisplayController::class,'PostSpot'])->name('posts.spot');
   Route::post('/post/{id}/check/',[DisplayController::class,'PostCheck'])->name('posts.check');
   Route::post('/post/{id}/check/store/',[DisplayController::class,'PostCheckStore'])->name('posts.checkstore');
   Route::post('/user/check',[DisplayController::class,'UserCheck'])->name('users.check');
   Route::post('/post/{id}/check/destroy',[DisplayController::class,'PostCheckDestroy'])->name('posts.checkdestroy');

   Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
   ]);
   Route::resource('spots','SpotController')->only([
    'store','destroy','edit','show','update'
   ]);
Route::post('/like', 'DisplayController@like')->name('posts.like');
Route::get('/footprint',[DisplayController::class,'likeFoot'])->name('likefoot');
Route::post('/users/{id}/follow','DisplayController@follow');
Route::post('/users/{id}/unfollow','DisplayController@unfollow');

});


