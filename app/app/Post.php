<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','date','image','episode','evolution'];

    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('post_id', $this->id)->first() !==null;
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function spot(){
        return $this->belongsTo('App\Spot');
    }
}
