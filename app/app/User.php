<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','profile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){
        return $this->hasMany('App\Post');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
    // public function likes(){
    //     return $this->belogsToMany('App\Model\Post','likes','user_id','post_id');
    // }
    // public function islike($postId){
    //     return $this->likes()->where('post_id',$postId)->exists();
    // }
    // public function like($postId)
    // {
    //   if($this->isLike($postId)){
    //     //もし既に「いいね」していたら何もしない
    //   } else {
    //     $this->likes()->attach($postId);
    //   }
    // }
    // public function unlike($postId)
    // {
    //   if($this->isLike($postId)){
    //     //もし既に「いいね」していたら消す
    //     $this->likes()->detach($postId);
    //   } else {
    //   }
    // }


    public function follow(){
        return $this->hasMany('App\Follow');
    }
}
