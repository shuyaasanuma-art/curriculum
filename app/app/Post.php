<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['spot_id','title','date','image','episode','evolution'];

    public function spot(){
        return $this->belongsTo('App\Post');
    }
}
