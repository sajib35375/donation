<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function replies(){
        return $this->hasMany('App\Models\Reply');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function post(){
        return $this->belongsTo('App\Models\Post');
    }
}
