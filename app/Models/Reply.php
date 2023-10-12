<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }

    public function comment(){
        return $this->belongsTo('App\Models\Comment');
    }
}
