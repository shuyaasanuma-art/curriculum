<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','date','image','episode','evolution'];

    public function like(){
        return $this->belongsTo('App\Like');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function spot(){
        return $this->belongsTo('App\Spot');
    }
}
