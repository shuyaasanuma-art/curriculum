<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['spot_id','title','date','image','episode','evolution'];

    public function like(){
        return $this->belongsTo('App\Like');
    }
}
