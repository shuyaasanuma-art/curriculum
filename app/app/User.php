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
    public function like_articles(){
        return $this->belongsToMany(Like::class,'likes','user_id','post_id');
    }
    
    // フォロワーの取得
    public function followUsers(){
        return $this->belongsToMany('App\User', 'follows', 'follow_id', 'user_id');
    }
    // フォローしている人の取得
    public function follows(){
        return $this->belongsToMany('App\User', 'follows', 'user_id', 'follow_id');
    }
    public function isFollowedBy($user): bool {
        return Follow::where('user_id', $user->id)->where('follow_id', $this->id)->first() !==null;
    }
}
