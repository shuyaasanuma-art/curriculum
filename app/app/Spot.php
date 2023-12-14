<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = ['name','address','logitude','atitude'];

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
