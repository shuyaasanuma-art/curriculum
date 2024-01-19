<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['follow_id', 'user_id'];

    protected $table = 'follows';
}
