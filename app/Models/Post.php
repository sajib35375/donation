<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tag(){
        return $this->belongsTo(Tag::class,'tag_id','id');
    }
    public function category(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
